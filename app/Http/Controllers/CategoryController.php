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
        $quotes = $category->quotes()->paginate(5);
        // $quotes = Quote::whereHas("categories", function($q) use ($category) {
        //     $q->where("id", $category->id);
        // })->paginate(9);

        return view("categories.single", compact("category", "quotes"));
    }
}
