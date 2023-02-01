<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'vote_average',
        'user_id',
        ];
        
    public function user_id()
{
    return $this->belongsTo(user_id::class);
}
}
