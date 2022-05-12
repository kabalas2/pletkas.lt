<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\CategorysArticles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        $data['categories'] = Category::where('parent_id',0)->get();
        return view('articles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $this->middleware('auth');
        $article = new Article();
        $article->title = $request->post('title');
        $article->content = $request->post('content');
        $article->teaser = $request->post('teaser');
        $article->image = $request->post('image');

        $article->author_id = Auth::id();
        $article->slug = Str::slug($article->title);
        $article->status = 1;
        $article->save();

        $catIds = $request->post('category_id');

        foreach ($catIds as $catId){
            $relationship = new CategorysArticles();
            $relationship->article_id = $article->id;
            $relationship->category_id = $catId;
            $relationship->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->middleware('auth');
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateArticleRequest $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->middleware('auth');
        $article = new Article();
        $article->title = $request->post('title');
        $article->content = $request->post('content');
        $article->teaser = $request->post('teaser');
        $article->image = $request->post('image');
        $article->status = $request->post('status');
        $article->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
