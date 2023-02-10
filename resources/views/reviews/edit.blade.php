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
        <h1>口コミ編集</h1>
        <form action="/reviews/{{ $review->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="review[title]" placeholder="ガンダム" value="{{ $review->title }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>本文</h2>
                <textarea name="review[body]" placeholder="良い出来映えだと思う。">{{ $review->body }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="review">
                <h2>評価</h2>
                <!--<div class="rate-form">-->
                <!--  <input id="star5" type="radio" name="review[review]" value="5">-->
                <!--  <label for="star5">★★★★★</label>-->
                <!--  <input id="star4" type="radio" name="review[review]" value="4">-->
                <!--  <label for="star4">★★★★</label>-->
                <!--  <input id="star3" type="radio" name="review[review]" value="3">-->
                <!--  <label for="star3">★★★</label>-->
                <!--  <input id="star2" type="radio" name="review[review]" value="2">-->
                <!--  <label for="star2">★★</label>-->
                <!--  <input id="star1" type="radio" name="review[review]" value="1">-->
                <!--  <label for="star1">★</label>-->
                <!--</div>-->
            <div class="rate-form">
                <input id="star5" type="radio" name="rate" value="5">
                  <label for="star5">★</label>
                  <input id="star4" type="radio" name="rate" value="4">
                  <label for="star4">★</label>
                  <input id="star3" type="radio" name="rate" value="3">
                  <label for="star3">★</label>
                  <input id="star2" type="radio" name="rate" value="2">
                  <label for="star2">★</label>
                  <input id="star1" type="radio" name="rate" value="1">
                  <label for="star1">★</label>
            </div>
                <p class="title_error" style="color:red">{{ $errors->first('review.review') }}</p>
            </div>
            <div class="name">
                <h2>プラモデル名</h2>
                <input type="text" name="review[name]" placeholder="ガンダム" value="{{ $review->name }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.name') }}</p>
            </div>
            <div class="grade">
                <h2>グレード</h2>
                <select name="review[grade]">
                    <option value="HG">HG</option>
                    <option value="MG">MG</option>
                    <option value="PG">PG</option>
                    <option value="RG">RG</option>
                    <option value="EG">EG</option>
                    <option value="SD">SD</option>
                    <option value="その他">その他</option>
                </select>
                <p class="title_error" style="color:red">{{ $errors->first('review.grade') }}</p>
            </div>
            <div class="height">
                <h2>高さ</h2>
                <input type="text" name="review[height]" placeholder="ガンダム" value="{{ $review->height }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.height') }}</p>
            </div>
            <div class="runner">
                <h2>ランナーの数</h2>
                <input type="text" name="review[runner]" placeholder="ガンダム" value="{{ $review->runner }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.runner') }}</p>
            </div>
            <input type="submit" value="update"/>
        </form>
        <div class="footer">
            <a href="/reviews/{{ $review->id }}">戻る</a>
        </div>
    </body>
</html>
</x-app-layout>