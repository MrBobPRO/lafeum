<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function contacts()
    {
        return view('contacts.index');
    }

}
