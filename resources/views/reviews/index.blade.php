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
        <h1>口コミ一覧</h1>
        <a href='/reviews/create' class='bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2'>投稿する</a>
        <div class='reviews'>
            @foreach ($reviews as $review)
                <div class='review'>
                   <a href="/reviews/{{ $review->id }}"><h2 class='title'>{{ $review->title }}</h2></a>
                    <p class='name'>{{ $review->name }}</p>
                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button type="button" onclick="deleteReview({{ $review->id }})">delete</button>
                    </form>
                    <br>
                </div>
            @endforeach
        </div>
       
        <script>
            function deleteReview(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
       
    </body>
</html>
<div>ログインユーザー</div>{{ Auth::user()->name }}
</x-app-layout>