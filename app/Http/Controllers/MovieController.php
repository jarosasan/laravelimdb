<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Category;
use App\Rating;
use App\Service\VotingService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRatingRequest;

use Illuminate\Support\Facades\Auth;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Rating $rating)
    {
    	$movies = Movie::paginate(12);
	    $data = ['movies'=> $movies];
	
	    return view('movie.movie', $data);
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function searchMovies(Request $request)
	{
		$items = Movie::where([
			['name', 'LIKE','%'.  $request->search . '%']
		])->paginate(12);
		
		$data = ['movies' => $items];
		
		return view('movie.movie', $data);
	}
	
	/**
	 * Show all movies from Category.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function categoryMovies($id)
	{
		$category = Category::findOrFail($id);
		
		$movies =$category->movies()->paginate(9);
		$data = ['movies'=> $movies];
		return view('movie.movie', $data);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMovieRating(CreateRatingRequest $request, $id)
    {
    	$movie = Movie::findOrFail($id);
	    $movie->ratings()->create($request->except('_token') + [
	    	'user_id' => Auth::id()
		    ]);
    	$data = ['id' => $id];
	    return redirect(route('show_movie', $data));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$movie = Movie::findOrfail($id);
    	$images = $movie->images;
    	
    	$data = ['movie'=>$movie, 'images'=>$images];
        return view('movie.movie_single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
