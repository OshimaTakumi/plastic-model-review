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
        <h1 class="title">
            {{ $review->title }}
        </h1>
        <div class='content'>
            <div class='content_review'>
                <h3>本文</h3>
                <p class='body'>{{ $review->body }}</p>
            </div>
            <div class="review">
                <h2>評価</h2>
                <p class='review'>{{ $review->review }}</p>
            </div>
            <div class="name">
                <h2>プラモデル名</h2>
                <p class='name'>{{ $review->name }}</p>
            </div>
            <div class="grade">
                <h2>グレード</h2>
                <p class='grade'>{{ $review->grade }}</p>
            </div>
            <div class="height">
                <h2>高さ</h2>
                <p class='height'>{{ $review->height }}</p>
            </div>
            <div class="runner">
                <h2>ランナーの数</h2>
                <p class='runner'>{{ $review->runner }}</p>
            </div>
            @if($review->image_url)
            <div>
                <img src="{{ $review->image_url }}" alt="画像が読み込めません。"/>
            </div>
            @endif
        <div class="edit">
            <a href="/reviews/{{ $review->id }}/edit">編集</a>
        </div>
        
        <div>
            @if($flag == false)
                <a href="/reviews/like/{{ $review->id }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $review->likes->count() }}</span></a>
            @else
                <a href="/reviews/unlike/{{ $review->id }}" class="btn btn-secondary btn-sm">いいね外す<span class="badge">{{ $review->likes->count() }}</span></a>
            @endif
        </div>
        <a href='/reviews/{{ $review->id }}/comment'>コメントする</a>
        
         <h1>コメント一覧</h1>
        <div class='review_comments'>
           
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>