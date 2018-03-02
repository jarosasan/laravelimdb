<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected  $fillable = ['name', 'description', 'user_id'];
	
	public function movies(){
		
		return $this->hasMany('App\Movie');
	}
	
	public function user(){
		
		return $this->belongsTo('App\User', 'user_id');
	}
}
