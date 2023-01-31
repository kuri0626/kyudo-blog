<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index(Article $article)
    {
        return view('articles/index')->with(['articles' => $article->getPaginateByLimit()]);
    }
    public function create(Tag $tag,Category $category)
    {
        return view('articles/create')->with(["tags" => $tag->get(),'categories'=>$category->get()]);
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
    public function store2(Request $request, Article $article)
    {
        $input_article = $request['article'];
        $input_tags = $request->tags_array;
        
        $article->fill($input_article)->save();
        
        $article->tags()->attach($input_tags);
        return redirect('/articles');
    }
    public function edit(Article $article)
    {
        return view('articles/edit')->with(['article' => $article]);
    }
    public function update(ArticleRequest $request, Article $article)
    {
        $input_article = $request['article'];
        $article->fill($input_article)->save();
        return redirect('/articles/' . $article->id);
    }
    public function delete2(Article $article)
    {
        return view('articles/delete')->with(["articles" => Article::get()]);
    }
    public function delete(Request $request, Article $article)
    {
        $article->delete();
        return redirect('/');
    }
}
