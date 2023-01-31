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
        <div>
            <input type="search" name="s" placeholder="例：弓手　切り下げ">
        </div>
        <input type="submit" value="検索"/>
        <div class = 'articles'>
            @foreach ($articles as $article)
                <div class = 'article'>
                    <p class = 'title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                </div>
                <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                
                <div class = 'tag'>
                    @foreach($article->tags as $tag)
                    {{ $article->tag_name }}
                    @endforeach
                </div>
            @endforeach
        </div>
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