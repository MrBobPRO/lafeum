<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(6);

        return view('quotes.index', compact('quotes'));
    }

    public function single($id)
    {
        $quote = Quote::find($id);
        $quotes = Author::find($quote->author_id)->quotes()->paginate(5);

        return view('quotes.single', compact("quote", "quotes"));
    }

}
