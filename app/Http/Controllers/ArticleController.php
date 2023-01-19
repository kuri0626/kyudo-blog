<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        return view('articles/index')->with(['articles'=>$article->getByLimit()]);
    }
    public function show(Article $article)
    {
        return view('articles/show')->with(['article' => $article]);
    }
}
