<?php

namespace App\Http\Controllers\Admin;

use App\Movie;
use App\Category;
use App\Actor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(20);
        $data = ['movies'=> $movies];
        return view('admin.movies', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$actors = Actor::all();
    	$categories = Category::all();
    	$data = ['categories' =>$categories, 'actors'=>$actors];
        return view('movie.form.movie_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Movie $movie, CreateMovieRequest $request)
    {
    	$movie = $movie->create($request->except('_token')+ [
    		'user_id' => Auth::id()
	    ]);
    	$movie->actors()->sync($request->actor_id);
    	return redirect(route('admin_movie'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie, $id)
    {
    	$movie = $movie->findOrFail($id);
    	$selectedActors = $movie->actors;
	    $actors = Actor::all();
	    $categories = Category::all();
    	$data = ['movie'=> $movie,'categories' =>$categories, 'actors'=>$actors, 'selectedActors'=>$selectedActors];
        return view('admin.form.movie_edit_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie, $id)
    {
	    $movie = $movie->findOrFail($id);
	    $movie->update($request->except('_token'));
	    $movie->actors()->sync($request->actor_id);
	    return redirect(route('admin_movie'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
       $movie =  Movie::findOrFail($id);
       $img = $movie->images;
       for($i = 0; $i < count($img); $i ++){
	       Storage::delete($img[$i]);
       }
       $movie->images()->delete();
       $movie->actors()->sync([]);
       $movie->delete();
        return redirect(route('admin_movie'));
    }
}
