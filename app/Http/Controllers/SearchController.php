<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->get('q');

        $articles = Article::where('title', 'LIKE', "%$q%")->orWhere('content', 'LIKE', "%$q%")->orWhere('teaser', 'LIKE', "%$q%")->paginate(10);

        return view('search.results', ['results'=>$articles]);
    }
}
