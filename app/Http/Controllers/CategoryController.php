<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function single($name)
    {
        return view('categories.single');
    }
}
