<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::paginate(10);
        return view('restaurant-backend.social-link.main', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant-backend.site-config.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'social_name' => 'required|max:100',
            'social_link' => 'required',
            'social_link_icon' => 'required',

        ]);
        try {
            $sociallink = new SocialLink;
            $sociallink->name = $request->social_name;
            $sociallink->link = $request->social_link;
            $sociallink->link_icon = $request->social_link_icon;
            $sociallink->save();
            notify()->success('Social Link is added successfully.');
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating the Social Link.');
        }
        return redirect()->route('sociallink.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialLink $socialLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'social_name' => 'required|max:100',
            'social_link' => 'required',
            'social_link_icon' => 'required',
        ]);
        try {
            $sociallink = SocialLink::findorFail($id);
            $sociallink->name = $request->social_name;
            $sociallink->link = $request->social_link;
            $sociallink->link_icon = $request->social_link_icon;
            $sociallink->save();
            notify()->success('Social Link is updated successfully.');
        } catch (ModelNotFoundException $e) {
            notify()->error('SocialLink Model not found');
        } catch (\Exception $e) {
            notify()->error('An error occurred while updating the Social Link.');
        }
        return redirect()->route('sociallink.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sociallink_delete = SocialLink::findOrFail($id);
            $sociallink_delete->delete();
            notify()->success('Social link deleted successfully');
        } catch (ModelNotFoundException $e) {
            notify()->error('Social Link Model not Found');
        } catch (\Exception $e) {
            notify('An error occurred while deleting the Social Link.');
        }
        return redirect()->route('sociallink.index');
    }
}
