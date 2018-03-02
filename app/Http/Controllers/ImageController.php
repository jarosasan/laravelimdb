<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Image;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createActorsImages($id)
    {
    	$data = ['id' => $id];
    
        return view('actors.forms.form_image', $data);
    }
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createMoviesImages($id)
	{
		$data = ['id' => $id];
		
		return view('movie.form.form_image', $data);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeActorImages(Request $request, $id)
    {
        $file = $request->file->store('public/images');
        $file = basename($file);
        $actor= Actor::findOrFail($id);
        $actor->images()->create([
        	'file_name' => '/'.$file,
	        'user_id' => Auth::id()
        ]);
        
        return redirect(route('show_actor',$id));
       
    }
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function storeMovieImages(Request $request, $id)
	{
		$file = $request->file->store('public/images');
		$file = basename($file);
		$movie= Movie::findOrFail($id);
		$movie->images()->create([
			'file_name' => '/'.$file,
			'user_id' => Auth::id()
		]);
		
		
		return redirect(route('show_movie', $id));
		
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image, $id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storage $storage, Image $image, $id)
    {
    	$image = $image->findOrFail($id);
        $image->delete();
        $storage->delete($image->file_name);
        
        return redirect(route('edit_movie'));
    }
}
