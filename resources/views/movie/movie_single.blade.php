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
							<div class="col-8 stars">
								@inject('voting', 'App\Service\VotingService')
								@if($voting->hasVouted(\Illuminate\Support\Facades\Auth::user(), $movie))

								<form action="{{route('store_movie_rating', $movie->id)}}" method="post">
									{!! csrf_field() !!}
									{!! method_field('PUT') !!}
									<input value="5" class="star star-5" id="star-5" type="radio" name="rating"/>
									<label class="star star-5" for="star-5"></label>
									<input value="4" class="star star-4" id="star-4" type="radio" name="rating"/>
									<label class="star star-4" for="star-4"></label>
									<input value="3" class="star star-3" id="star-3" type="radio" name="rating"/>
									<label class="star star-3" for="star-3"></label>
									<input value="2" class="star star-2" id="star-2" type="radio" name="rating"/>
									<label class="star star-2" for="star-2"></label>
									<input value="1" class="star star-1" id="star-1" type="radio" name="rating"/>
									<label class="star star-1" for="star-1"></label>
									<button type="submit">Voute</button>
								</form>
								@endif
							</div>
							<div class="col-4">
								<i class="mdi mdi-star rating">{{number_format($movie->rating, 1, '.', '') }}</i>
							</div>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col-12 gallery">
					@for($i = 0; $i < $images->count(); $i ++ )
						<img src="{{ asset('storage/images/'.$images[$i]->file_name) }}" alt="..." class="img-thumbnail">
					@endfor
				</div>
			</div>
			</div>

			@if(Auth::check())
			<div>
				<a class="btn btn-primary btn-block" href="{{route('create_movies_image', $movie->id)}}" >Add Image</a>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection