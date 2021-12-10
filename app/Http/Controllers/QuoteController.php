<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Author;
use App\Models\Category;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function filter(Request $request)
    {
        $quotes = Helper::filter_quotes($request->category_ids, $request->author_id, $request->keyword);
        $quotes->withPath(route("quotes.index"));

        return view("quotes.list", compact("quotes"));
    }

    public function index(Request $request)
    {
        $quotes = Helper::filter_quotes($request->category_ids, $request->author_id, $request->keyword);
        
        //used in filters & search
        // Decode JSON Array because category_ids comes in encoded JSON stringify type. 
        $active_category_ids =  $request->category_ids ? json_decode($request->category_ids) : [];
        $author_id = $request->author_id;
        $keyword = $request->keyword;

        return view('quotes.index', compact('quotes', "active_category_ids", "author_id", "keyword"));
    }

    public function single($id)
    {
        $quote = Quote::find($id);
        $quotes = Author::find($quote->author_id)->quotes()->paginate(12);

        return view('quotes.single', compact("quote", "quotes"));
    }


    public function dashboard_create()
    {
        $authors = Author::orderBy("name", "asc")->select("name", "id")->get();
        $categories = Category::orderBy("name", "asc")->select("name", "id")->get();

        return view("dashboard.quotes.create", compact("authors", "categories"));
    }

    public function store(Request $request)
    {
        $quote = new Quote();
        $quote->body = $request->body;
        $quote->author_id = $request->author_id;
        $quote->popular = $request->popular == "on" ? true : false;
        $quote->save();

        $quote->categories()->attach($request->categories);

        return redirect()->route("dashboard.index");
    }

    public function dashboard_single($id)
    {
        $quote = Quote::find($id);
        $authors = Author::orderBy("name", "asc")->select("name", "id")->get();
        $categories = Category::orderBy("name", "asc")->select("name", "id")->get();

        return view("dashboard.quotes.single", compact("quote", "authors", "categories"));
    }

    public function update(Request $request)
    {
        $quote = Quote::find($request->id);
        $quote->body = $request->body;
        $quote->author_id = $request->author_id;
        $quote->popular = $request->popular == "on" ? true : false;
        $quote->save();
        //attach categories
        $quote->categories()->detach();
        $quote->categories()->attach($request->categories);

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $quote = Quote::find($id);
            $quote->categories()->detach();
            $quote->delete();
        }
    }

}
