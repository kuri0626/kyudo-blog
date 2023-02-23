<!DOCTYPE html>
<html lang = "{{ str_replace('_','-',app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <title>弓道射技検索サイト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>弓道射技検索サイト</h1>
        <h2>ここは射技についての知識を共有するブログサイトです！</h2>
        <h3>下の検索バーで欲しい情報を検索しましょう！</h3>
        <div>
            <form action="/articles/search" method="POST">
                @csrf
      　　　　 　  　<input type="search" name="search"  value="{{request('search')}}" placeholder="例：弓手　切り下げ" >
                <input type="submit" value="検索">
            </form>
        </div>
        <div class = 'articles'>
            <h3>人気の投稿</h3>
            @foreach ($articles as $article)
                <div class = 'article'>
                    <p class = 'title'>
                        <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                    </p>
                </div>
                <div class = 'tag'>
                    @foreach($article->tags as $tag)
                    {{ $article->tag_name }}
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class = 'category'>
            <h3>カテゴリー別一覧はこちら！</h3>
            @foreach($categories as $category)
                <a href="/categories/{{ $category->id }}">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class = 'bbs'>
            <h3>掲示板はこちら！</h3>
            <a href="/bbs/bbs">掲示板</a>
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