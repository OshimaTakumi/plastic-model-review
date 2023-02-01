<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(Review $review)//インポートしたReviewをインスタンス化して$reviewとして使用。
{
    return view('reviews/index')->with(['reviews' => $review->get()]); //$reviewの中身を戻り値にする。
}

public function show(Review $review)
    {
    return view('reviews/show')->with(['review' => $review]);
    }
    
    public function create()
{
    return view('reviews/create');
}
    
    
    public function store(ReviewRequest $request, Review $review)
    {
        $input = $request['review'];
        $input["user_id"] = auth()->id();
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function edit(Review $review)
    {
        return view('reviews/edit')->with(['review' => $review]);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {
        $input_review = $request['review'];
        $review->fill($input_review)->save();
        
        return redirect('/reviews/' .$review->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
}
