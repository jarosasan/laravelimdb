<?php

use Illuminate\Database\Seeder;
use App\Actor;
use App\Image;

class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//	    for ($i = 100; $i < 300; $i ++){
//		    $content =  file_get_contents('https://api.themoviedb.org/3/person/'.$i.'?api_key=1241492df1b7de6199062c478cd93274&language=en-US
//');		    $content = json_decode($content);
//
//			$actor  = new Actor();
//			$actor->name = $content->name;
//			$actor->surname = $content->name;
//			$actor->birth_day = $content->birthday;
//			$actor->death_day = $content->deathday;
//			$actor->user_id = 4;
//
//		    $images = $content->profile_path;
//
//		    $image = new Image();
//		    $image->filename = $images;
//		    $image->user_id = 4;
//		    $image->imagable_id = $i;
//		    $image->imagable_id = 'App\Actor';
//
//
//
//	    }
	    $content =  file_get_contents('https://api.themoviedb.org/3/person/80?api_key=1241492df1b7de6199062c478cd93274&language=en-US
');		    $content = json_decode($content);
	    dump($content);
    }
}
