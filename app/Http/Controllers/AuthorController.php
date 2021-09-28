<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index');
    }

    public function single($name)
    {
        return view('authors.single');
    }
}
