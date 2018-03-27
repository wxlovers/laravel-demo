<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesController extends Controller
{
    //
    public function index()
    {
        $name = 'Wxlovers';
        return view('sites/about')->with('name', $name);
    }

    public function contact()
    {
        return view('sites/contact');
    }
}
