<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>弓道射技検索アプリ</h1>
        <h2>ここは射技についての知識を共有するブログサイトです！</h2>
        <h3>下の検索バーで欲しい情報を検索しましょう！</h3>
        <div class = 'articles'>
            @foreach ($articles as $article)
                <div class = 'article'>
                    <p class = 'title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                </div>
            @endforeach
        </div>
    </body>
</html>