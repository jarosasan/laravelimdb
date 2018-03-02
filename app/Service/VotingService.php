<?php
	
	
	
	namespace App\Service;
	
	use App\Rating;
	
	class VotingService {
		
		public function hasVouted( $user, $movie) {
			
			if (isset($user)){
				$rating = Rating::where([['user_id', '=', $user->id], ['movie_id', '=', $movie->id]] )->count();
				return ($rating > 0 ) ? false : true;
			}
			
		}
	}