<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索アプリ</title>
        <link rel="stylesheet" href="{{ asset('/css/articles/compile.css')  }}" >
    </head>
    <body>
        <h1 class="title">編集実行画面</h1>
        <div class="content">
            <form action="/articles/{{ $article->id }}" class="compile" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='article[title]' value="{{ $article->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <textarea name='article[body]'>{{ old('article.body') }}</textarea>
                </div>
                <div class="footer">
                    <input type="submit" value="edit">
                </div>
            </form>
        </div>
    </body>
</html>