<!DOCTYPE HTML>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Article</title>
    </head>
    <body>
        <h1>投稿作成画面</h1>
        <form action="/articles" method="POST">
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
            <input type="submit" value="作成"/>
            @csrf
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>