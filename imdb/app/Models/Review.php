<?php

namespace App\Models;

use App\Models\User;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'rating', 'user_id', 'movie_id'];

    
    //Database relationships
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movie() {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
