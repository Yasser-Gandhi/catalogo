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

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'synopsis' => 'required',
            'year' => 'required',
            'cover' => 'required',
        ]);

        $movie = Movie::find($id);
        $movie->title = $request->get('title');
        $movie->synopsis = $request->get('synopsis');
        $movie->year = $request->get('year');
        $movie->cover = $request->get('cover');

        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

        $movie->save();

        return redirect('/movies')->with('success', '¡Película actualizada con éxito!');
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect('/movies')->with('success', '¡Película eliminada con éxito!');
    }
}
