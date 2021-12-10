<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

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


    public function dashboard_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "name";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "asc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $authors = Author::orderBy($order_by, $order_type)
            ->withCount("quotes")
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Author::orderBy("name", "asc")->select("name", "id")->get();
        $items_count = count($all_items);

        return view("dashboard.authors.index", compact("authors", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        return view("dashboard.authors.create");
    }

    public function store(Request $request)
    {
        $validation_rules = [
            "name" => "unique:authors"
        ];

        $validation_messages = [
            "name.unique" => "Автор с таким именем уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $author = new Author();
        $author->name = $request->name;
        $author->biography = $request->biography;
        $author->popular = $request->popular == "on" ? true : false;
        $author->url = Helper::transliterate_into_latin($author->name);
        $author->save();

        $this->store_image($request, $author);

        return redirect()->route("dashboard.authors.index");
    }

    public function dashboard_single($id)
    {
        $author = Author::find($id);

        return view("dashboard.authors.single", compact("author"));
    }

    public function update(Request $request)
    {
        $author = Author::find($request->id);

        // Validate uique filends
        $validation_errors = [];
        if($request->name != $author->name) {
            $duplicate = Author::where("name", $request->name)->first();
            if ($duplicate) array_push($validation_errors, "Автор с таким именем уже существует !");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $author->name = $request->name;
        $author->biography = $request->biography;
        $author->popular = $request->popular == "on" ? true : false;
        $author->url = Helper::transliterate_into_latin($author->name);
        $author->save();

        $this->store_image($request, $author);

        return redirect()->back();
    }

    public function drop_image(Request $request)
    {
        $author = Author::find($request->id);
        $author->photo = "__default.jpg";
        $author->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.authors.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $author = Author::find($id);
            $author->quotes()->delete();
            $author->delete();
        }
    }

    private function store_image($request, $author)
    {
        //resize image and store
        $photo = $request->file("photo");
        if ($photo) {
            $filename = $author->url . "." . $photo->getClientOriginalExtension();
            $photo->move(public_path("img/authors"), $filename);
            $author->photo = $filename;
            $author->save();

            //Create new img from original
            $img = Image::make(public_path("img/authors/" . $filename));
            $height = $img->height();
            $width = $img->width();

            //make same images height and width
            if ($width < $height) {
                $img->fit($width, $width, function ($constraint) {
                    $constraint->upsize();
                }, 'center');
            } else {
                $img->fit($height, $height, function ($constraint) {
                    $constraint->upsize();
                }, 'center');
            }

            //resize image if images width > 300px
            $newWidth = $img->width();
            if ($newWidth > 300) {
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            //save img
            $img->save(public_path('img/authors/' . $filename));
        }
    }
}
