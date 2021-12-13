<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Top;
use Illuminate\Http\Request;
use Image;

class TopController extends Controller
{
    public function dashboard_index()
    {
        $top = Top::orderBy("id", "asc")->get();

        return view("dashboard.top.index", compact("top"));
    }

    public function dashboard_single($id)
    {
        $top = Top::find($id);
        $categories = Category::orderBy("name", "asc")->get();

        return view("dashboard.top.single", compact("top", "categories"));
    }

    public function update(Request $request)
    {
        $top = Top::find($request->id);
        $top->category_id = $request->category_id;
        $top->save();

        //resize image and store
        $image = $request->file("image");
        if ($image) {
            $filename = $top->category->url . "." . $image->getClientOriginalExtension();
            $image->move(public_path("img/categories"), $filename);
            $top->image = $filename;
            $top->save();

            //Create new img from original
            $img = Image::make(public_path("img/categories/" . $filename));

            //crop from center in needed size
            $img->fit(400, 392, function ($constraint) {
                $constraint->upsize();
            }, 'center');

            //save img
            $img->save(public_path('img/categories/' . $filename));
        }

        return redirect()->back();
    }
}
