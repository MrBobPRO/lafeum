<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')
                ->select('name', 'url')
                ->get();

        $latest_quotes = Quote::latest()->take(8)->get();

        return view('home.index', compact('categories', 'latest_quotes'));
    }

    public function update_refresher()
    {
        return view("templates.refresher");
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $authors = Author::where("name", "LIKE", "%" . $keyword . "%")
                        ->orWhere("biography", "LIKE", "%" . $keyword . "%")
                        ->orderBy("name")->get();

        $quotes = Quote::where("body", "LIKE", "%" . $keyword . "%")
                        ->latest()->get();

        return view("search.index", compact("keyword", "authors", "quotes"));
    }

}
