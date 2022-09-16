<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //Show user's list of movies
    public function show() {
       
        return view('lists.list', [
            'List_items' => MovieList::where('user_id', auth()->id())->filter(request(['search']))->simplePaginate(8),
            
        ]);
    }

    //Add movie to user's watchlist
    public function add(Request $request) {
        $formData = $request->validate([
            'title' => 'required',
            'movie_id' => 'required'
        ]);

        $formData['user_id'] = auth()->id();

        //ckeck if already added
        $item = MovieList::where([
                ['user_id', $formData['user_id']],
                ['movie_id', $formData['movie_id']]
                ])->first();

        if($item != null) {
            return back()->withErrors('fart');
        } else {
            MovieList::create($formData);
            
        }

        return back();
    }
    
    //Mark movie as watched
    public function watched(Request $request, $item) {
        $watched = $request->validate([
            'watched' => 'required'
        ]);

        MovieLIst::where('id', $item)->update($watched);

        return back();
    }

    //Delete from watchlist
    public function destroy(MovieList $item) {
        $item->delete();
        return back();
    }
}
