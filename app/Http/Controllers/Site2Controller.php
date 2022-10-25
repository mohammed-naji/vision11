<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site2Controller extends Controller
{
    public function home()
    {
        return 'home page';
    }

    public function about()
    {
        return 'about page';
    }

    public function services()
    {
        return 'services page';
    }

    public function contact()
    {
        return 'contact page';
    }

    public function team()
    {
        return 'team page';
    }

}
