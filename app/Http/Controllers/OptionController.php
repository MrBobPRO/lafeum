<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function dashboard_index()
    {
        $options = Option::orderBy("key", "asc")->paginate(30);

        //used in search & counting
        $all_items = Option::orderBy("key", "asc")->select("key", "id")->get();
        $items_count = count($all_items);

        return view("dashboard.options.index", compact("options", "all_items", "items_count"));
    }

    public function dashboard_single($id)
    {
        $option = Option::find($id);

        return view("dashboard.options.single", compact("option"));
    }

    public function update(Request $request)
    {
        $option = Option::find($request->id);
        $option->value = $request->value;
        $option->save();

        return redirect()->back();
    }
}
