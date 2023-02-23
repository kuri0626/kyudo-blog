<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>弓道射技検索アプリ</title>
    </head>
    <body class="antialiased">
    <h2>ここはチャットスペースです！</h2>
    <h2>周りの人達とお話しましょう！</h2>
    <main class="container">
        @foreach($bbses as $b)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
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
        <form method="post">
            @csrf
            <div class="form-group row mb-3">
                <label for="title" class="col-sm-2 col-form-label">タイトル</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="タイトル" value="{{ old('title') }}" autofocus>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="body" class="col-sm-2 col-form-label">内容</label>
                <div class="col-sm-10">
                    <textarea name="body" class="form-control" id="body" rows="10" placeholder="内容を入力してください">{{ old('body') }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> 送信</button>
                </div>
            </div>
            <a href="/">トップに戻る</a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
