<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索サイト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>弓道射技検索サイト</h>
        <h2>ここは{{$articles[0]->category->name}}についての投稿一覧です！</h2>
        <h3>新着順</h3>
        <div class = 'articles'>
            @foreach($articles as $article)
                <div class = 'article'>
                    <p class = 'title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                </div>
            @endforeach
        </div>
        <a href="/">トップに戻る</a>
        <div>
        <a href='/articles/create'>管理者用</a>
        </div>
    </body>
</html>