<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>弓道射技検索アプリ</h>
        @foreach($articles as $article)
        <h2>ここは{{ $article->category->name }}についての投稿一覧です！</h2>
        @endforeach
        <div class = 'articles'>
            @foreach($articles as $article)
                <div class = 'article'>
                    <p class = 'title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                    <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  type="button" onclick="deleteArticle({{ $article->id }})">削除</button>
                    </form>
                </div>
            @endforeach
        </div>
        <a href="/">トップに戻る</a>
        <a href='/articles/create'>管理者用</a>
        <script>
            function deleteArticle(id){
                'use strict'
                
                if(confirm('削除すると元に戻せません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>