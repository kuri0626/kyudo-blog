<!DOCTYPE HTML>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>弓道射技検索サイト</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/articles/show.css')  }}" >
    </head>
    <body>
        <div class="title">
            <h1>
                {{ $article->title }}
            </h1>
        </div>
        <div class="content">
            <div class="content__article">
                <p>{{ $article->body }}</p>
            </div>
        </div>
        <div class="category">
            <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
        </div>
        <div class="tag">
            @foreach($article->tags as $tag)
                {{ $tag->name }}
            @endforeach
        </div>
        <div>
            @if($article->image_url)
                <img src="{{ $article->image_url }}" alt="画像が読み込めません。"/>
            @endif
            </div>
        <div class="footer">
            <p>あなたは<label>{{$article->access_counter}}</label>人目の訪問者です！</p>
            <a href="/">トップに戻る</a>
        </div>
    </body>
</html>