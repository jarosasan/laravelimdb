<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Movie;
use App\Http\Requests\UpdateActorRequest;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateActorRequest;
use Illuminate\Http\Request;


class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::paginate(12);
        $data = ['actors' => $actors];
        return view('actors.actors', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$movie = Movie::all();
    	$data = ['movies'=> $movie];
        return view('actors.forms.form_actor', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActorRequest $request, Actor $actor)
    {
    	$user = Auth::user();
    	$user = $user->actors()->create($request->except('_token'));
    	$user->movies()->sync($request->movie_id);
	  
	    return redirect(route('admin_actors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actors, $id)
    {
    $actor = $actors->findOrFail($id);
    $images = $actor->images;
    $data = ['actor'=>$actor, 'images'=>$images];
	    
	    return view('actors.actor_images', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor, $id)
    {
        $actor = $actor->findOrFail($id);
        $selectedMovies = $actor->movies;
        $movies = Movie::all();
        
        $data = ['actor'=>$actor, 'selectedMovies'=>$selectedMovies, 'movies'=>$movies];
        return view('actors.forms.actor_edit_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActorRequest $request, $id)
    {
    	$actor = Actor::findOrFail($id);
	    $actor->update($request->except('_token'));
	    $actor->movies()->sinc($request->movies_id);
	    return redirect(route('admin_actors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $actor =  Actor::findOrFail($id);
	    $img = $actor->images;
	    for($i = 0; $i < count($img); $i ++){
		    Storage::delete($img[$i]);
	    }
	    $actor->movies->sync([]);
	    $actor->images()->delete();
	    $actor->delete();
	    return redirect(route('admin_actors'));
    }
}
