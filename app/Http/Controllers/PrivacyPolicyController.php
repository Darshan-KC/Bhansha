<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(){
        return view('restaurant-frontend.privacypolicy');
    }
}
