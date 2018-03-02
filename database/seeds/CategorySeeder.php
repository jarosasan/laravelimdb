<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
	    $categories =  file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=1241492df1b7de6199062c478cd93274&language=en-US');
	    $content = json_decode($categories);
	    $content = $content->genres;
	    
	    for ( $i= 0; $i < count($content); $i++){
			$category = new Category();
			$category->name = $content[$i]->name;
			$category->description = $content[$i]->name;
			$category->user_id = 1;
			$category->save();
	    }
    	
}
}
