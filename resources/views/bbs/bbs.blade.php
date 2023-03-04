<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/bbs/bbs.css')  }}" >
        <title>弓道射技検索サイト</title>
    </head>
    <body class="antialiased">
    <h1>掲示板</h1>
    <h2>周りの人達に質問しましょう！</h2>
    <div class="caution">
        <h3>！注意！</h3>
        <h4>※性的・過激な発言はお控えください</h4>
        <h4>※内容欄に「To 〇〇さん」のように、誰に対する返信なのかわかりやすくしましょう</h4>
        <h4>※周りの人に嫌な思いをさせないように、マナー・モラルを守って節度ある発言をお願いします</h4>
    </div>
    <hr>
    <main class="container">
        @foreach($bbses as $b)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="title">
                        <strong>{{ $b->title }}</strong>
                    </div>
                    <div class="col-sm-6 text-right">
                        <small>{{ $b->update_at }}</small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="float-end">
                    <div class="col-sm-6">
                        <strong>{{ $b->body }}</strong>
                    </div>
                </div>
                <div class="card-text">
                    <p class="white-space" style="white-space: break-spaces;">{{ $b->contents }}</p>
                </div>
            </div>
        </div>
        <div class="mt-3"></div>
        @endforeach
        <div class="mt-5"></div>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> エラー</h4>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="bbs" method="post">
            @csrf
            <div class="title_name">
                <h4>タイトル・名前</h4>
                <div class="textbox">
                    <input type="text" name="title" class="text-control" id="title" placeholder="タイトルや名前などを入力してください" value="{{ old('title') }}" autofocus>
                </div>
            </div>
            <div class="body">
                <h4>内容</h4>
                <div class="body">
                    <textarea name="body" class="form-control" id="body" rows="10" placeholder="質問内容を入力してください" autofocus>{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="submit">
                <div class="submit">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> <h3>送信</h3></button>
                </div>
            </div>
            <div class="footer">
                <a href="/">トップに戻る</a>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
