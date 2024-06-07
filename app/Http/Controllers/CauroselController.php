<?php

namespace App\Http\Controllers;

use App\Models\Caurosel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CauroselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caurosels = Caurosel::paginate(10);
        return view('restaurant-backend.caurosel.main', compact('caurosels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant-backend.caurosel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'image_id' =>'required|integer',
        ]);
        $caurosel = new Caurosel;
        $caurosel->image_id = $request->image_id;
        $caurosel ->save();
        notify()->success('Caurosel is created successfully');
        return redirect()->route('caurosel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Caurosel $caurosel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $caurosel = Caurosel::with('image')->find($id);

        return view('restaurant-backend.caurosel.edit', compact('caurosel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caurosel $caurosel)
    {
        $request->validate([
            'image_id' =>'required|integer',
           ]);
           try{
           $id = $caurosel->id;
           $caurosels = Caurosel::findorFail($id);
           $caurosels->image_id = $request->image_id;
           $caurosels ->update();
           notify()->success('Caurosel is created successfully');
           }
           catch(ModelNotFoundException $e){
            notify()->error('Model not found');
           }
           catch(\Exception $e){
            notify()->error('An error occurred while updating the  Caurosel.');
           }
           return redirect()->route('caurosel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            // Find the AboutUs entry by ID
            $caurosel = Caurosel::findOrFail($id);

            // Delete the AboutUs entry
            $caurosel->delete();

            // Add a success notification
            notify()->success(' Caurosel deleted successfully.');

        } catch (ModelNotFoundException $e) {
            // Handle the case where the AboutUs entry is not found
            notify()->error('Caurosel Model not found.');
        } catch (\Exception $e) {
            // Handle other exceptions
            notify()->error('An error occurred while deleting the caurosel.');
            // You can log the exception or perform any other necessary actions here
        }

        // Redirect to the index page
        return redirect()->route('caurosel.index');
    }

}
