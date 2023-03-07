<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; //Instanciamos el modelo Movie
use Session;
use Redirect;
//use App\Http\Requests\ItemCreateRequest;
//use App\Http\Requests\ItemUpdateRequest;
//use Illuminate\Support\Facades\Validator;
use DB;
use Input;
use Storage;


class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $movies = Movies::all();
        return view('movies.create', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'synopsis' => 'required',
            'year' => 'required',
            'cover' => 'required',
        ]);

        $movie = new Movie([
            'title' => $request->get('title'),
            'synopsis' => $request->get('synopsis'),
            'year' => $request->get('year'),
            'cover' => $request->get('cover'),
        ]);
        $movie->save();
        return redirect('/movies')->with('success', '¡Película guardada con éxito!');
    }
}
