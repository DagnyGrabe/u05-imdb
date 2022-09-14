<?php

namespace App\Models;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'country', 'year', 'tags', 'image', 'description', 'user_id'];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('country', 'like', '%' . request('search') . '%')
                ->orWhere('year', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    public static function rate($movie) {
        $reviews = Review::where('movie_id', $movie['id'])->get();
        $sum = 0;
        $ratings = 0;
        foreach ($reviews as $review) {
            $sum += $review['rating'];
            $ratings ++;
        }
        if($sum == 0 || $ratings == 0) {
            $average = 'inga betyg';
        } else {
        $average = (floor(($sum / $ratings)* 100)) / 100;
        }
        return $average;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'movie_id');
    }
}
