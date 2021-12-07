<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function single($url)
    {
        $category = Category::where("url", $url)->first();
        $quotes = $category->quotes()->paginate(12);

        //used in filters & search
        $active_category_ids = [$category->id];
        $author_id = null;
        $keyword = null;

        return view("categories.single", compact("category", "quotes", "active_category_ids", "author_id", "keyword"));
    }
}
