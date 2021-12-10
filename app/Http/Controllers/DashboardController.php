<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "created_at";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "desc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        if($order_by == "category_names") {
            $quotes = Quote::selectRaw("group_concat(categories.name order by categories.name asc) as category_names, quotes.*") 
                    ->join("category_quote", "quotes.id", "=", "category_quote.quote_id")
                    ->join("categories", "categories.id", "=", "category_quote.category_id")
                    ->groupBy("quote_id")
                    ->orderBy($order_by, $order_type)
                    ->paginate(30, ["*"], "page", $active_page)
                    ->appends($request->except("page"));
        }

        else if ($order_by == "author_name") {
            $quotes = Quote::join("authors", "quotes.author_id", "=", "authors.id")
                    ->select("quotes.*", "authors.*", "authors.name as author_name")
                    ->orderBy($order_by, $order_type)
                    ->paginate(30, ["*"], "page", $active_page)
                    ->appends($request->except("page"));
        }
        
        else {
            $quotes = Quote::orderBy($order_by, $order_type)
                    ->paginate(30, ["*"], "page", $active_page)
                    ->appends($request->except("page"));
        }

        //used in search & counting
        $all_items = Quote::orderBy("body", "asc")->select("body", "id")->get();
        $items_count = count($all_items);

        return view("dashboard.quotes.index", compact("quotes", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }
}
