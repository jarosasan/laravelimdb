<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	protected $fillable = ['user_id', 'rating', 'movie_id'];
	
	protected $table = 'rating';
}
