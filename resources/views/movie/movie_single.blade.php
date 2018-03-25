@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row" style="margin-top: 0">
		<div class="single-movie">
			<div class="row">
				<div class="col-8">
					<div class="col-12 movie-head">
						<h1 class="">{{ $movie->name }}</h1>
					</div>
					<div class="col-12 text-center" >
						<h2 class="year">( {{$movie->year}} )</h2>
					</div>
					<div class="col-12">
						<p>Categories:	<a href="{{route('movie_from_category', $movie->category->id)}}">{{$movie->category->name}}, </a>
						</p>
					</div>
					<div class="col-12 movie-desc">
						<p class="description">{{$movie->description}}</p>
					</div>
					<div class="col-12">
						<p>Stars:
						@foreach($movie->actors as $actor)
							<a href="{{route('show_actor', $actor->id)}}">{{$actor->name}} {{$actor->surname}}, </a>
						@endforeach
						</p>
					</div>
					<div class="row">
						<div class="col-12">
							<iframe width="420" height="315"
							        src="https://www.youtube.com/embed/{{$movie->video}}">
							</iframe>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="col-12 ficher-image">
							<img src="{{ asset('storage/images/'.$images->first()->file_name) }}" alt="..." class="img-thumbnail">
					</div>
					<div class="col-12">
						<div class="row">
							<div class="col-9 stars">
								@inject('voting', 'App\Service\VotingService')
								@if($voting->hasVouted(\Illuminate\Support\Facades\Auth::user(), $movie))

								<form action="{{route('store_movie_rating', $movie->id)}}" method="post">
									{!! csrf_field() !!}
									{!! method_field('PUT') !!}
									<fieldset class="rating">
										<input type="radio" id="star5" name="rating" value="5" />
										<label for="star5" title="Rocks!">5 stars</label>
										<input type="radio" id="star4" name="rating" value="4" />
										<label for="star4" title="Pretty good">4 stars</label>
										<input type="radio" id="star3" name="rating" value="3" />
										<label for="star3" title="Meh">3 stars</label>
										<input type="radio" id="star2" name="rating" value="2" />
										<label for="star2" title="Kinda bad">2 stars</label>
										<input type="radio" id="star1" name="rating" value="1" />
										<label for="star1" title="Sucks big time">1 star</label>
										<button
												class="waves-effect waves-light btn vote"	type="submit">Voute</button>
									</fieldset>
								</form>
								@endif
							</div>
							<div class="col-3 rat">
								<i class="mdi mdi-star">{{number_format($movie->rating, 1, '.', '') }}</i>
							</div>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-12 gallery">
					@for($i = 0; $i < $images->count(); $i ++ )
						<img src="{{ asset('storage/images/'.$images[$i]->file_name) }}" alt="..." class="img-thumbnail">
					@endfor
					@if(Auth::check())
							<a class="btn vote" href="{{route('create_movies_image', $movie->id)}}" >Add Image</a>
					@endif
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection