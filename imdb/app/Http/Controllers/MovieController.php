<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //show landing page
    public function index(Movie $movie) {
        
        return view('index', [
            'movies' => Movie::latest()->filter(request(['tag', 'search']))->simplePaginate(4),
            'average' => Movie::rate($movie)
        ]);    
    }

    //show single movie
    public function show(Movie $movie) {
        
        return view('movies.movie', [
            'movie' => $movie,
            'reviews' => Review::where('movie_id', $movie['id'])->get(),
            'average' => Movie::rate($movie)  
        ]);
    }

    //show create form
    public function create() {
        return view('movies.create');
    }

    //store movie
    public function store(Request $request) {
        $formData = $request->validate([
            'title' => 'required',
            'country' => 'required',
            'year' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ],
        [
            'title.required' => 'Filmen måste ha en titel',
            'country.required' => 'Land måste anges',
            'year.required' => 'Årtal måste anges',
            'tags.required' => 'Minst en kategori måste anges',
            'description.required' => 'Filmen måste ha en beskrivning'
        ]);

        if($request->hasFile('image')) {
            $formData['image'] = $request->file('image')->store('movie-images', 'public');
        }

        $formData['user_id'] = auth()->id();

        Movie::create($formData);

        return redirect('/');
    }

    //show edit form
    public function edit(Movie $movie) {
        return view('movies.edit', ['movie' => $movie]);
    }

    //update movie
    public function update(Request $request, $id) {
        $formData = $request->validate([
            'title' => 'required',
            'country' => 'required',
            'year' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ],
        [
            'title.required' => 'Filmen måste ha en titel',
            'country.required' => 'Land måste anges',
            'year.required' => 'Årtal måste anges',
            'tags.required' => 'Minst en kategori måste anges',
            'description.required' => 'Filmen måste ha en beskrivning'
        ]);

        if($request->hasFile('image')) {
            $formData['image'] = $request->file('image')->store('movie-images', 'public');
        }

        Movie::where('id', $id)->update($formData);

        return redirect("/movies/$id");
    }

    //Delete movie
    public function destroy(Movie $movie) {
        $movie->delete();
        return redirect('/');
    }

}
