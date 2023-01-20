<!DOCTYPE HTML>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Articles</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $article->title }}
        </h1>
        <div class="content">
            <div class="content__article">
                <p>{{ $article->body }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">トップに戻る</a>
        </div>
    </body>
</html>