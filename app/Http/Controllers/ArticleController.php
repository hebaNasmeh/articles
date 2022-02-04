<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use Illuminate\Support\Facades\Auth;
use Validator;


class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the all articles.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all(['id','title','content']);
        return response()->json($articles);
    }

    /**
     * Store a new article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request['user_id'] = Auth::user()->id;
        $article = Article::create($request->post());
        return response()->json([
            'message'=>'Article Created Successfully!!',
            'article'=>$article
        ]);
    }

    /**
     * edit article.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Article $article)
    {
        return response()->json($article);
    }

    /**
     * Update article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->fill($request->post())->save();
        return response()->json([
            'message'=>'Article Updated Successfully!!',
            'article'=>$article
        ]);
    }

    /**
     * Delete article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            'message'=>'Article Deleted Successfully!!'
        ]);
    }
}
