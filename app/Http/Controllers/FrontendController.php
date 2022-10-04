<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //__Home Page__//
    public function home()
    {
        return view('frontend.index');
    }

    //__Home Page__//
    public function about()
    {
        return view('frontend.about');
    }

    //__Home Page__//
    public function contact()
    {
        return view('frontend.contact');
    }

    //__Home Page__//
    public function single()
    {
        return view('frontend.single');
    }

    //__Home Page__//
    public function category()
    {
        return view('frontend.category');
    }
}
