<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageStoreRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::with([])->paginate(5);
        return view('restaurant-backend.file-management.main', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant-backend.file-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            if ($request->hasFile('image')) {
                $photo_name =  time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('uploads/profile'), $photo_name);

                Image::create([
                    'name' => $photo_name,
                    'category' => $validated['category'],
                ]);
                notify()->success('File uploaded successfully');
                return redirect()->route('file.index');
            }
        } catch (ModelNotFoundException $e) {
            notify()->error('Image not submitted.');
        } catch (\Exception $e) {
            notify()->error('An error occurred while submitting the images.');
        }
        return redirect()->route('file.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image, string $id)
    {

        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'category' => 'required|string|max:255',
            ]);
            $image = Image::find($id);
            if ($request->hasFile('image')) {
                $photo_name = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('uploads/profile'), $photo_name);
                if ($image->name) {
                    //Remove old icon file
                    unlink(public_path('uploads/profile/' . $image->name));
                }
                $image->name = $photo_name;
            }
            $image->category = $request->category;
            $image->save();
            notify()->success('Image is updated successfully.');
        } catch (ModelNotFoundException $e) {
            notify()->error('Image not Found');
        } catch (\Exception $e) {
            notify()->error('An error occurred while updating the images.');
        }
        return redirect()->route('file.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $image_delete = Image::findOrFail($id);
            if ($image_delete->name) {
                unlink(public_path('uploads/profile/' . $image_delete->name));
            }
            $image_delete->delete();
            notify()->success('Image deleted successfully');
        } catch (ModelNotFoundException $e) {
            notify()->error('Image not found.');
        } catch (\Exception $e) {
            notify()->error('An error occurred while deleting the image content.');
        }
        return redirect()->route('file.index');
    }
}
