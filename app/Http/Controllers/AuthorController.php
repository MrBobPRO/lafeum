<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function filter(Request $request)
    {
        $authors = Helper::filter_authors($request->category_ids, $request->keyword);
        $authors->withPath(route("authors.index"));

        return view("authors.list", compact("authors"));
    }

    public function index(Request $request)
    {
        $authors = Helper::filter_authors($request->category_ids, $request->keyword);
        $authors->withPath(route("authors.index"));

        //used in filters & search
        // Decode JSON Array because category_ids comes in encoded JSON stringify type. 
        $active_category_ids =  $request->category_ids ? json_decode($request->category_ids) : [];
        $keyword = $request->keyword;

        return view('authors.index', compact('authors', "active_category_ids", "keyword"));
    }

    public function single($url)
    {
        $author = Author::where("url", $url)->first();
        $quotes = $author->quotes()->paginate(15);

        return view('authors.single', compact("author", "quotes"));
    }
}
