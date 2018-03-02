<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	
	protected $fillable = ['file_name', 'user_id' ];

	public function actor(){
		
		return $this->morphedByMany('App\Actor', 'imagiable');
	}
	
	public function movie(){
		
		return $this->morphedByMany('App\Movie', 'imagiable');
	}
	
}
