<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteConfigs = SiteConfig::with('image')->first();
        return view('restaurant-backend.site-config.main', compact('siteConfigs'));
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
            'logo_title' => 'required',
            'image_id' => 'required|integer',
            'company_name' => 'required',
            'popular_dish_title' => 'required',
            'special_food' => 'required',
            'social_headline' => 'required',
            'description' => 'nullable|max:2048',
        ]);

        try {

            $site = new SiteConfig;
            $site->logo_title = $request->logo_title;
            $site->logo_id  = $request->image_id;
            $site->company_name = $request->company_name;
            $site->popular_dish_title = $request->popular_dish_title;
            $site->special_food = $request->special_food;
            $site->social_headline = $request->social_headline;
            $site->description = $request->description;
            $site->save();
            notify()->success('Site Config is created successfully.');
        } catch (\Exception $e) {
            notify()->error('An error occurred while creating site configuration');
        }
        return redirect()->route('site.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteConfig $siteConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteConfig $siteConfig, string $id)
    {
        $siteConfigs = SiteConfig::find($id);
        return view('restaurant-backend.site-config.edit', compact('siteConfigs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {

        $request->validate([
            'logo_title' => 'required',
            'image_id' => 'required|integer',
            'company_name' => 'required',
            'popular_dish_title' => 'required',
            'special_food' => 'required',
            'social_headline' => 'required',
            'description' => 'nullable|max:2048',
        ]);
        try {
            $site = SiteConfig::findOrFail($id);
            $site->logo_title = $request->logo_title;
            $site->logo_id  = $request->image_id;
            $site->company_name = $request->company_name;
            $site->popular_dish_title = $request->popular_dish_title;
            $site->special_food = $request->special_food;
            $site->social_headline = $request->social_headline;
            $site->description = $request->description;
            $site->save();
            notify()->success('Site Config is Updated successfully.');
        } catch (ModelNotFoundException $e) {
            notify()->error('Site Config not found');
        } catch (\Exception $e) {
            notify()->error('An error occurred while updating site configuration');
        }
        return redirect()->route('site.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $site_delete = SiteConfig::findOrFail($id);
            $site_delete->delete();
            notify()->success('Site Configuration deleted successfully.');
        } catch (ModelNotFoundException $e) {
            notify()->error('Site configuration not found');
        } catch (\Exception $e) {
            notify()->error('An error occurred while deleting site configuration');
        }
        return redirect()->route('site.index');
    }
}
