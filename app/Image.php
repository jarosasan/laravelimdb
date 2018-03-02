<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	
	protected $fillable = ['file_name', 'user_id' ];

	public function actor(){
		
		return $this->morphMany('App\Actor', 'imagable');
	}
	
	public function movie(){
		
		return $this->morphMany('App\Movie', 'imagable');
	}
	
	public function related(){
		
		return $this->morphTo( 'imagable');
	}
}
