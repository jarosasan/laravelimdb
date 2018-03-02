<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	protected  $fillable = ['name', 'birth_day', 'death_day', 'user_id'];
	
	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public function images(){
		return $this->morphMany('App\Image', 'imagable');
		
	}
	
	public function movies(){
		return $this->belongsToMany(Movie::class, 'actor_movie');
	}
}
