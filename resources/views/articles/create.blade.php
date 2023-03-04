<!DOCTYPE HTML>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索サイト</title>
        <link rel="stylesheet" href="{{ asset('/css/articles/create.css')  }}" >
    </head>
    <body>
        <h1>投稿作成画面</h1>
        <form action="/articles" class="create" method="POST" enctype="multipart/form-data">
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="article[title]" value="{{ old('article.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('article.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="article[body]">{{ old('article.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('article.body') }}</p>
            </div>
            <div class="category">
                <h2>カテゴリー</h2>
                <select name="article[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <h2>タグ</h2>
                    @foreach($tags as $tag)
                        <label>
                            <input type="checkbox" value="{{ $tag->id }}" name="tags_array[]" >
                               {{ $tag->tag_name }}
                            </input>
                        </label>
                    @endforeach>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="作成"/>
            @csrf
        </form>
        <a href="/articles/delete">削除画面</a>
        <a href="/articles/edit">編集画面</a>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>