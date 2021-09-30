<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')
                ->select('name', 'transliteration')
                ->get();

        $latest_quotes = Quote::latest()->take(5)->get();

        return view('home.index', compact('categories', 'latest_quotes'));
    }

    public function contacts()
    {
        return view('contacts.index');
    }

}
