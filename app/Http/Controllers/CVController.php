<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        return view('cv.index');
    }

    public function experience()
    {
        return view('cv.experience');
    }

    public function education()
    {
        return view('cv.education');
    }

    public function skills()
    {
        return view('cv.skills');
    }

    public function interests()
    {
        return view('cv.interests');
    }

    public function awards()
    {
        return view('cv.awards');
    }
}
