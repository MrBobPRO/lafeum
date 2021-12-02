<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('name', 'asc')->paginate(9);

        return view('authors.index', compact('authors'));
    }

    public function single($url)
    {
        $author = Author::where("url", $url)->first();
        $quotes = $author->quotes()->paginate(5);

        return view('authors.single', compact("author", "quotes"));
    }
}
