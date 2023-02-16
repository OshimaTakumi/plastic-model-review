<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Review_comment;

class CommentController extends Controller
{
      public function create(Review $review)
    {
        $review_id=$review->id;
    return view('reviews/comment')->with(['review_id'=>$review_id]);
    }
    public function store(Request $request, Review_comment $review_comment)
    {
    $input = $request['comment'];
    $input["user_id"] = auth()->id();
    $review_comment->fill($input)->save();
    return redirect('/reviews/'.$review_comment->id);
    }
}
