<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $fillable = ['name','category_id', 'user_id', 'description',
		'year', 'rating', 'video'];
	
	public function category(){
		
		return $this->belongsTo('App\Category');
	}
	
	public function images(){
		return $this->morphMany('App\Image', 'imagable');
	}
	
	public function actors(){
		return $this->belongsToMany(Actor::class, 'actor_movie');
	}
	
	public function getRatingAttribute(  ) {
		$ratings = $this->ratings;
		if(count($ratings) == 0){
			return 0;
		}
		$result = 0;
		for ($i = 0; $i < count($ratings); $i ++){
			$result += $ratings[$i]->rating;
		}
		$result = $result / count($ratings);
		return $result;
	}
	
	public function ratings(  ) {
		return $this->hasMany(Rating::class);
	}
}
