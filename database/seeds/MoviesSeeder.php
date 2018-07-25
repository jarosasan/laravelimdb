<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Image;
use App\Category;
use App\Actor;
use Illuminate\Support\Facades\Storage;


class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	    $categories = new Category();
	
	    for ( $i = 860; $i < 900; $i ++ ) {
		    try {
		    	echo "uzklausa";
			    $content = file_get_contents( 'https://api.themoviedb.org/3/movie/' . $i . '?api_key=1241492df1b7de6199062c478cd93274&language=en-US' );
			    $content = json_decode( $content );
			    $year = current( explode( '-', $content -> release_date ) );
			    echo "uzklausa";
			    $video = file_get_contents('https://api.themoviedb.org/3/movie/'.$i.'/videos?api_key=1241492df1b7de6199062c478cd93274&language=en-US');
			    $video = json_decode($video);
			    $video = $video->results;
			   
			
			    $movie         = new Movie();
			    $movie -> name = $content -> title;
			    $movie -> year = $year;
			    $movie -> category_id = $categories -> where( 'name', $content -> genres[0] -> name ) -> first() -> id;
			    $movie -> description = $content -> overview;
			    $movie -> user_id     = 1;
			    $movie -> video = isset($video[0]->key)?$video[0]->key:null;
			    $movie -> save();
			    
			    $movieId = $movie->id;
		
			
			    $images = $content -> poster_path;
			
			    if ( $images ) {
				    $image                  = new Image();
				    $image -> file_name     = $images;
				    $image -> user_id       = 1;
				    $image -> imagable_id   = $movieId;
				    $image -> imagable_type = 'App\Movie';
				    $image -> save();
				    echo "uzklausa";
				    $poster = file_get_contents( 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/' . $images );
				    Storage ::put( 'public/images/' . $images, $poster );
			    }
			    echo "uzklausa";
			    $actors = file_get_contents( 'https://api.themoviedb.org/3/movie/' . $i . '/credits?api_key=1241492df1b7de6199062c478cd93274' );
			    $actors = json_decode( $actors );
			    $actors = $actors -> cast;
			
			
			    if ( count( $actors ) > 0 ) {
				    for($p = 0; $p < min(5, count($actors)); $p ++) {
					    echo "uzklausa";
					    $person = file_get_contents( 'https://api.themoviedb.org/3/person/' . $actors[$p] -> id . '?api_key=1241492df1b7de6199062c478cd93274&language=en-US' );
					    $person = json_decode( $person );
					
					    $actor = new Actor();
					    
					    if ( $actor -> where( 'name', $person -> name ) -> first() ) {
						    $movie -> actors() -> attach( $actor -> where( 'name', $person -> name ) -> first()->id );
					    }else{
						    $actor -> name      = $person -> name;
						    $actor -> birth_day = isset($person -> birthday)?$person -> birthday:null ;
						    $actor -> death_day = isset($person -> deathday)? $person -> deathday:null;
						    $actor -> user_id   = 1;
						    $actor -> save();
						
						    $movie->actors()->attach($actor->id);
						    echo "uzklausa";
						    $actorImages = file_get_contents( 'https://api.themoviedb.org/3/person/' . $person -> id . '/images?api_key=1241492df1b7de6199062c478cd93274' );
						    $actorImages = json_decode( $actorImages );
						    $actorImages = $actorImages -> profiles;
						
						    if ( count( $actorImages ) > 0 ) {
							    for ( $a = 0; $a < min(4, count($actorImages)); $a ++ ) {
								    echo "uzklausa";
								    $profile = file_get_contents( 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/' . $actorImages[ $a ]->file_path );
								    Storage ::put( 'public/images/' .$actorImages[$a]->file_path, $profile);
								    $image                  = new Image();
								    $image -> file_name     = $actorImages[ $a ]->file_path;
								    $image -> user_id       = 1;
								    $image -> imagable_id   = $actor->id;
								    $image -> imagable_type = 'App\Actor';
								    $image -> save();
							    }
						    }
					    }
				    }
			    }
		    } catch ( ErrorException $e ) {
			    dump( $e );
		    }
		
	    }
    }
    public function checkDate($date) {
	    $dat  = explode( '-', $date );
	    if(count($dat) !== 3){
	    	return null;
	    }
	    $date = ( checkdate( $dat[2], $dat[1], $dat[0] ) ) ? $date : null;
	
	    return $date;
    }

}
