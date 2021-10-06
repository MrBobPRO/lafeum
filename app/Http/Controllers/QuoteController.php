<?php

namespace App\Http\Controllers;

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
        return view('quotes.single');
    }

}
