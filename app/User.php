<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'fb_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function actors(){
    	return $this->hasMany('App\Actor', 'user-id');
    }
	
	public function categories(){
		return $this->hasMany('App\Category', 'user-id');
	}
	/*
	 * Check has role.
	 *
	 * @return bulian.
	 * */
	public function hasRole($role){
		if( $this->role == $role ){
			return true;
		}else{
			return false;
		}
	}
 
}
