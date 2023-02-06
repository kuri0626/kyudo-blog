<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //投稿一覧ページ
    public function index(Article $article)
    {
        return view('articles/index')->with(['articles' => $article->getPaginateByLimit()]);
    }
    //管理者用ページ
    public function create(Tag $tag,Category $category)
    {
        return view('articles/create')->with(["tags" => $tag->get(),'categories'=>$category->get()]);
    }
    //投稿詳細ページ
    public function show(Article $article)
    {
        return view("articles/show")->with(["article" => $article->load("tags")]);
    }
    //管理者用ページの投稿機能
    public function store(Article $article, ArticleRequest $request)
    {
        $input = $request['article'];
        $article->fill($input)->save();
        $input_tags = $request->tags_array;
        
        $article->tags()->attach($input_tags);
        return redirect('/articles/' . $article->id);
    }
    //投稿へタグの紐づけ
    public function tag(Request $request)
    {
        $tag_id = $request->$tag_id;
        $article->tags()->attach($tag_id);
    }
    //タグ検索機能
    public function search(Request $request,Article $articles)
    {
        $request->input();
        $keyword = $request->search;
        if (!empty($keyword))
        {
            $articles = Article::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('body', 'like', '%' . $keyword . '%')
            ->orWhereHas('tags', function ($query) use ($keyword){
                $query->where('tag_name', 'like', '%' . $keyword . '%');
            })
            ->paginate(10);
        }else{dd($articles->get());
            return redirect('/');
        }//dd($articles->post());
        return view('articles/search')->with(['articles' => $articles,'keyword' => $keyword]);
    }
    //投稿編集ページ
    public function edit(Article $article)
    {
        return view('articles/edit')->with(['article' => $article]);
    }
    //投稿のアップデート
    public function update(ArticleRequest $request, Article $article)
    {
        $input_article = $request['article'];
        $article->fill($input_article)->save();
        return redirect('/articles/' . $article->id);
    }
    //管理者用ページから削除画面への遷移
    public function delete2(Article $article)
    {
        return view('articles/delete')->with(["articles" => Article::get()]);
    }
    //投稿の削除機能
    public function delete(Request $request, Article $article)
    {
        
        $article->delete();
        return redirect('articles/create');
    }
}
