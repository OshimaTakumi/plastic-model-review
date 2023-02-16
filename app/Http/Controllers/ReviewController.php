<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class ReviewController extends Controller
{
    public function index(Review $review)
{
    return view('reviews/index')->with(['reviews' => $review->get()]); 
}


public function show(Review $review)
    {
      $flag=$review->likes()->where('user_id', Auth::id())->exists();
    
    return view('reviews/show')->with(['review' => $review,'flag'=>$flag]);
    }
    
    public function create()
{
    return view('reviews/create');
}
    
    
    public function store(ReviewRequest $request, Review $review)
    {
        $input = $request['review'];
        if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url]; 
        }
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
    
     // いいね機能関連
  public function __construct()
  {
    $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
  }

  public function like($id)
  {
    Like::create([
      'review_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Review.');

    return redirect('/reviews/' . $id);
  }

  public function unlike($id)
  {
    $like = Like::where('review_id', $id)->where('user_id', Auth::id())->first();
    
    $like->delete();

    session()->flash('success', 'You Unliked the Review.');

    return redirect('/reviews/' . $id);
  }
  

}
