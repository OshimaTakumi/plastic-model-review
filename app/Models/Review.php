<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    
     protected $fillable = [
        'title',
        'body',
        'review',
        'name',
        'grade',
        'height',
        'runner',
        'user_id',
        ];
        
//    public function user_id()
//{
//    return $this->belongsTo(user_id::class);
//}

    public function likes()
{
    return $this->hasMany(Like::class, 'review_id');
}
    
      
  public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    dd($this->likes);
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  
}
}