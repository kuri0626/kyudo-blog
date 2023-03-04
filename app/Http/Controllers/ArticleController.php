<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Bb;
use Illuminate\Support\Facades\DB;
use Cloudinary;

class ArticleController extends Controller
{
    //ログイン機能
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
 
        if (Auth::User()->admin == true) {
            return redirect('/articles/create');
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    //投稿一覧ページ
    public function index(Article $article, Category $category)
    {
        return view('articles/index')->with(['articles' => $article->getPaginateByLimit(5) , 'categories' => $category->get()]);
    }
    public function introduction(Article $article)
    {
        return view('articles/introduction');
    }
    //管理者用ページ
    public function create(Request $request, Tag $tag,Category $category)
    {
        return view('articles/create')->with(["tags" => $tag->get(),'categories'=>$category->get()]);
    }
    //投稿詳細ページ
    public function show(Article $article, Request $request)
    {
        //アクセスカウンター
        $article->access_counter += 1;
        $article->save();
        return view("articles/show")->with(["article" => $article->load("tags")]);
    }
    //管理者用ページの投稿機能
    public function store(Article $article, Request $request)
    {
       $input = $request['article'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            // dd($image_url);
            $input += ['image_url' => $image_url];
        }
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
        }else{
            return redirect('/');
        }
        return view('articles/search')->with(['articles' => $articles,'keyword' => $keyword]);
    }
    //管理者用ページから編集画面への遷移
    public function transitionToEdit(Article $article)
    {
        return view('articles/edit')->with(["articles" => Article::get()]);
    }
    //編集画面から編集実行画面への遷移
    public function transitionToCompile(Article $article)
    {
        return view('articles/compile')->with(['article' => $article]);
    }
    //投稿のアップデート
    public function update(ArticleRequest $request, Article $article)
    {
        $input_article = $request['article'];
        $article->fill($input_article)->save();
        return redirect('/articles/' . $article->id);
    }
    //管理者用ページから削除画面への遷移
    public function transitionToDelete(Article $article)
    {
        return view('articles/delete')->with(["articles" => Article::get()]);
    }
    //投稿の削除機能
    public function deleteArticle(Request $request, Article $article)
    {
        
        $article->delete();
        return redirect('articles/create');
    }
}
