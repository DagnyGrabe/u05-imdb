<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect("/movies/{$formData['movie_id']}")
        ->with('message', 'Recension postad!');
    }
    
    //Delete review if owned by user
    public function destroy(Review $review) {
        $userId = \Auth::id();
        $user = User::find($userId);
        
        if($review['user_id'] == auth()->id() || $user->admin == true) {
            $review->delete();
        
            return back()->with('message', 'Recension borttagen!');
        } else {
            return back()->with('message', 'Du saknar rättigher för denna åtgärd');
        }
    }
}