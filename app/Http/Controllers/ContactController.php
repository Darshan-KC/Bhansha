<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('restaurant-backend.contact.contact-main', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $contacts = Contact::all();

        return view('restaurant-backend.contact.contact-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required | max:255',
            'email' => 'required | email| max:100',
            'phone' => 'required|min:10',
            'fax' => 'required| max:50  ',

        ]);
        // return $request;

        Contact::create($request->all());
        notify()->success('Contact created successfully');

        return redirect(route('contact.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contacts)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contacts)
    {
        return view('contact.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contacts, string $id)
    {
        $contacts=Contact::find($id);
        $request->validate([
            'address' => 'required |max:255',
            'email' => 'required | email | max:100',
            'phone' => 'required|min:10',
            'fax' => 'required | max:50',
        ]);
        if ($contacts->update($request->all())) {
            notify()->success('Contact updated successfully');
            return redirect()->route('contact.index');
        } else {
            notify()->error('Contact update failed');
            // Redirect to error page or return error response (with details)
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contacts, $id)
    {
        $contacts=Contact::find($id);
        if (!is_null($contacts)) {
            $contacts->delete();
            notify()->success('delete successfully.');
            return redirect()->route('contact.index');
        }
        notify()->error('delete failed');
        return redirect()->route('contact.index');
    }
}
