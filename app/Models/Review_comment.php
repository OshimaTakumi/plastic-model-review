<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Review_comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'review_id',
        'user_id',
    ];

  public function review()
  {
    return $this->belongsTo(Review::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}