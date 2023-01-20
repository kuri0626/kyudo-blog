<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        return view('articles/index')->with(['articles'=>$article->getByLimit()]);
    }
    public function create()
    {
        return view('articles/create');
    }
    public function show(Article $article)
    {
        return view('articles/show')->with(['article' => $article]);
    }
    public function store(Article $article, ArticleRequest $request)
    {
        $input = $request['article'];
        $article->fill($input)->save();
        return redirect('/articles/' . $article->id);
    }
}
