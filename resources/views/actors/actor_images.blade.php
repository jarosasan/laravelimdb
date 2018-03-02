@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		<div class="single-actor">
			<div class="row">
				<div class="actor-head col-12">
					<h1 class="">{{ $actor->name }} {{$actor->surname}}</h1>
					<h3 class="">{{ $actor->birth_day }} - {{ $actor->death_day }}</h3>
				</div>
			</div>
			<div class="row">
				<div class="actor-gallery col-9">
					@for($i = 0; $i < $images->count(); $i ++ )
						<img src="{{ asset('storage/images'.$images[$i]->file_name) }}" alt="..." class="img-thumbnail">
					@endfor
				</div>
				<div class="col-3 actor-movies">
					<h2 class="text-center">Movies</h2>
					<ul>
						@foreach($actor->movies as $movie)
							<li><a href="{{route('show_movie', $movie->id)}}"><i class="mdi mdi-movie "></i>{{$movie->name}}</a></li>
						@endforeach
					</ul>

				</div>
			</div>
			@if(Auth::check())
			<div>
				<button class="btn btn-primary btn-block"><a href="{{route('create_actors_image', $actor->id)}}" >Add Image</a></button>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection