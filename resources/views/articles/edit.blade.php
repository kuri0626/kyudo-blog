<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 >投稿編集画面</h1>
        <div class='articles'>
            @foreach($articles as $article)
                <div class='article'>
                    <p class='title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                    <!--<form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class='content__title'>
                            <h2>タイトル</h2>
                            <input type='text' name='article[title]' value="{{ $article->title }}">
                        </div>
                        <div class='content__body'>
                            <h2>本文</h2>
                            <input type='text' name='article[body]' value="{{ $article->body }}">
                        </div>
                        <input type="submit" value="edit">
                    </form>-->
                </div>
                <a href="/articles/{{ $article->id }}/compile">編集</a>
            @endforeach
        </div>
    </body>
</html>