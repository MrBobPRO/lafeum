<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Quote;
use App\Models\Top;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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


    public function dashboard_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "name";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "asc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $categories = Category::orderBy($order_by, $order_type)
            ->withCount("quotes")
            ->paginate(50, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Category::orderBy("name", "asc")->select("name", "id")->get();
        $items_count = count($all_items);

        return view("dashboard.categories.index", compact("categories", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        return view("dashboard.categories.create");
    }

    public function store(Request $request)
    {
        $validation_rules = [
            "name" => "unique:categories"
        ];

        $validation_messages = [
            "name.unique" => "Категория с таким названием уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->url = Helper::transliterate_into_latin($category->name);
        $category->save();

        return redirect()->route("dashboard.categories.index");
    }

    public function dashboard_single($id)
    {
        $category = Category::find($id);

        return view("dashboard.categories.single", compact("category"));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);

        // Validate uique filends
        $validation_errors = [];
        if ($request->name != $category->name) {
            $duplicate = Category::where("name", $request->name)->first();
            if ($duplicate) array_push($validation_errors, "Категория с таким названием уже существует !");
        }

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->url = Helper::transliterate_into_latin($category->name);
        $category->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $deletion = $this->permanent_delete($ids);
        if (!$deletion) {
            //escape Top categories error
            $this->escape_null_top_categories();
            return "Ошибка. Как минимум 1 категория должна существовать !";
        }

        return redirect()->route("dashboard.categories.index");
    }

    public function remove_multiple(Request $request)
    {
        $deletion = $this->permanent_delete($request->ids);
        if (!$deletion) {
            //escape Top categories error
            $this->escape_null_top_categories();
            return "Ошибка. Как минимум 1 категория должна существовать !";
        }

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $category = Category::find($id);

            //return error if there are no more categories. At least 1 category must exist
            $exists = Category::where("id", "!=", $id)->first();
            if (!$exists) return false;

            $category->quotes()->detach();
            $category->delete();
        }

        //escape Top categories error
        $this->escape_null_top_categories();

        return true;
    }

    private function escape_null_top_categories()
    {
        $exists = Category::first();
        $top = Top::all();
        foreach ($top as $t) {
            $cat = Category::find($t->category_id);
            if (!$cat) {
                $t->category_id = $exists->id;
                $t->save();
            }
        }
    }
}
