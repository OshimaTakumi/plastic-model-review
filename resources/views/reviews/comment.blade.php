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
        <h1>コメント投稿</h1>
        <form action="/reviews/comment" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="comment[title]" placeholder="タイトル" value="{{ old('review.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="comment[body]" placeholder="良い出来映えだと思う。">{{ old('review.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <input type="hidden" name="comment[review_id]" value="{{ $review_id }}">
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>