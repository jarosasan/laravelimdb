<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;


class FacebookController extends Controller
{
	public function redirect(  ) {
		return Socialite::driver('facebook')->redirect();
    }
	
	public function callback(  ) {
		$fbUser = Socialite ::driver( 'facebook' ) -> user();
		$users  = new User();
		
		if ( $users -> where( 'fb_id', $fbUser -> id )->first() ) {
			
			Auth ::login($users -> where( 'fb_id', $fbUser -> id )->first());
			return redirect( route( 'home' ) );
		}else{
			
			$user = new User();
			$user->name = $fbUser->name;
			$user->email = $fbUser->email;
			$user->role = 'user';
			$user->password = '';
			$user->fb_id = $fbUser->id;
			$user->save();
			
			Auth::login($user);
			
			return redirect( route( 'home' ) );
		}
	}
}
