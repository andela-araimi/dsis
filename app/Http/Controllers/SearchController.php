<?php

namespace Dsis\Http\Controllers;

use Dsis\Item;
use Dsis\Http\Requests;
use Illuminate\Http\Request;
use Dsis\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    /**
     * Perform a search query and return results
     * if any otherwise notify user No results.
     */
    public function getResults(SearchRequest $request)
    {
        $results = Item::orderBy('id', 'Desc')
           ->where('name', 'like', '%'.$request->search.'%')
           ->orWhere('price', 'like', '%'.$request->search.'%')
           ->paginate(5);

        return view('layout.search', compact('results'));
    }
}
