<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索アプリ</title>
        <link rel="stylesheet" href="{{ asset('/css/articles/delete.css')  }}" >
    </head>
    <body>
        <h1>投稿削除画面</h1>
        <div class = 'articles'>
            @foreach ($articles as $article)
                <div class = 'article'>
                    <p class = 'title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                    <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" class="delete"  method="post">
                        @csrf
                        @method('DELETE')
                        <button  type="button" onclick="deleteArticle({{ $article->id }})">削除</button>
                    </form>
                </div>
                <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
            @endforeach
        </div>
        <a href='/'>トップに戻る</a>
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