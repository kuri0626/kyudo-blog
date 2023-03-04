<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索アプリ</title>
        <link rel="stylesheet" href="{{ asset('/css/articles/edit.css')  }}" >
    <body>
        <h1 >投稿編集画面</h1>
        <div class='articles'>
            @foreach($articles as $article)
                <div class='article'>
                    <p class='title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                </div>
                <div class="edit">
                    <a href="/articles/{{ $article->id }}/compile">編集</a>
                </div>
            @endforeach
        </div>
    </body>
</html>