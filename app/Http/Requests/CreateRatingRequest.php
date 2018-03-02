<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;
use App\Service\VotingService;
use App\Movie;

class CreateRatingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	$id = $this->route('id');
	    $user = Auth::user();
	    $votingService = new VotingService();
	    $movie = Movie::findOrfail($id);
	    $votingService =  $votingService->hasVouted($user, $movie);
        return $votingService;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
        ];
    }
}
