<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //Show review form
    public function write(Movie $movie) {
        return view('reviews.write', [
            'movie' => $movie,
            
        ]);

    }

    //Store review
    public function store(Request $request) {
        $formData = $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'movie_id' => 'required'
        ],
        [
            'title.required' => 'Välj en titel',
            'rating.required' => 'Betygsätt',
            'description.required' => 'Skriv något'
        ]);

        $formData['user_id'] = auth()->id();
        

        Review::create($formData);

        return redirect('/');
    }
}