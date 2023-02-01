<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        　ガンプラ口コミサイト
    </x-slot>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
    </head>
    <body class="antialiased">
        <h1>口コミ投稿</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="review[title]" placeholder="タイトル" value="{{ old('review.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="review[body]" placeholder="良い出来映えだと思う。">{{ old('review.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="review">
                <h2>評価</h2>
                <input type="text" name="review[review]" placeholder="★★★★☆" value="{{ old('review.review') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.review') }}</p>
            </div>
            <div class="vote_average"> 
                <h2>平均評価</h2>
                <input type="text" name="review[vote_average]" placeholder="4" value="{{ old('review.vote_average') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.vote_average') }}</p>
            </div>
            <div class="name">
                <h2>プラモデル名</h2>
                <input type="text" name="review[name]" placeholder="ガンダム" value="{{ old('review.name') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.name') }}</p>
            </div>
            <div class="grade">
                <h2>グレード</h2>
                <input type="text" name="review[grade]" placeholder="RG" value="{{ old('review.grade') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.grade') }}</p>
            </div>
            <div class="height">
                <h2>高さ</h2>
                <input type="text" name="review[height]" placeholder="約13cm" value="{{ old('review.height') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.height') }}</p>
            </div>
            <div class="runner">
                <h2>ランナーの数</h2>
                <input type="text" name="review[runner]" placeholder="10" value="{{ old('review.runner') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.runner') }}</p>
            </div>
            
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>