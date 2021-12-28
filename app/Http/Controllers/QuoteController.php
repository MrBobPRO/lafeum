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
        //used to get filter sort paginate etc quotes (also by ajax requests)
        $quotes = Helper::filter_quotes($request->category_id, $request->keyword);
        // redirect quotes.index if category_id == null
        if(!$request->category_id) {
            $quotes->withPath(route("quotes.index"));
        //else redirect to single categories page
        } else {
            $quotes->withPath(route("categories.single", Category::find($request->category_id)->url));
        }

        return view("quotes.list", compact("quotes"));
    }

    public function index(Request $request)
    {
        $quotes = Helper::filter_quotes(null, $request->keyword);

        //used in filtering quotes
        $active_category_id = null;
        $keyword = $request->keyword;

        return view('quotes.index', compact('quotes', "active_category_id", "keyword"));
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
