<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索サイト</title>
        <link rel="stylesheet" href="{{ asset('/css/categories/index.css')  }}" >
    </head>
    <body>
        <h1>弓道射技検索サイト</h>
        <h2>ここは<label>{{$articles[0]->category->name}}</label>についての投稿一覧です！</h2>
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
        <div class="footer">
            <a href="/">トップに戻る</a>
        </div>
    </body>
</html>