<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutStoreRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = AboutUs::with('image')->paginate(10);
        return view('restaurant-backend.about.main', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant-backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutStoreRequest $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validated();

            // Create a new AboutUs instance
            $about = new AboutUs;
            $about->heading = $request->title;
            $about->description = $request->description;
            $about->image_id = $request->image_id;

            // Save the AboutUs instance
            $about->save();

            // Add a success notification
            notify()->success('AboutUs Content is created successfully');

        } catch (\Exception $e) {
            // Handle any exceptions that occur
            notify()->error('An error occurred while creating AboutUs Content');
            // You can log the exception or perform any other necessary actions here
        }

        // Redirect to the index page
        return redirect()->route('aboutUs.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs, String $id)
    {

        $abouts = AboutUs::with('image')->find($id);
        return view('restaurant-backend.about.edit', compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     */



public function update(Request $request, AboutUs $aboutUs, string $id)
{
    try {
        $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|max:2048',
            'image_id' => 'required|integer',
        ]);

        // Find the AboutUs entry by ID
        $about = AboutUs::findOrFail($id);

        // Update the AboutUs entry with the request data
        $about->heading = $request->title;
        $about->description = $request->description;
        $about->image_id = $request->image_id;
        $about->save();

        // Add a success notification
        notify()->success('AboutUs Content is updated successfully.');

    } catch (ModelNotFoundException $e) {
        // Handle the case where the AboutUs entry is not found
        notify()->error('AboutUs not found.');
    } catch (\Exception $e) {
        // Handle other exceptions
        notify()->error('An error occurred while updating the AboutUs Content.');
        // You can log the exception or perform any other necessary actions here
    }

    // Redirect to the index page
    return redirect()->route('aboutUs.index');
}



    /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id)
     {
         try {
             // Find the AboutUs entry by ID
             $aboutUs = AboutUs::findOrFail($id);

             // Delete the AboutUs entry
             $aboutUs->delete();

             // Add a success notification
             notify()->success('AboutUs Content deleted successfully.');

         } catch (ModelNotFoundException $e) {
             // Handle the case where the AboutUs entry is not found
             notify()->error('AboutUs not found.');
         } catch (\Exception $e) {
             // Handle other exceptions
             notify()->error('An error occurred while deleting the AboutUs Content.');
             // You can log the exception or perform any other necessary actions here
         }

         // Redirect to the index page
         return redirect()->route('aboutUs.index');
     }
}
