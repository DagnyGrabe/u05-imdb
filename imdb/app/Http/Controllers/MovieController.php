<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        
        return view('index', [
            'movies' => Movie::latest()->simplePaginate(6)
        ]);
        
    }

    public function show(Movie $movie) {
        return view('movie', [
            'movie' => $movie
        ]);
    }
}
