@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		@foreach($movies as $movie)
			<div class="col-3">
				<div class="cat-box" style="background-size: cover; background-image:
				@if($movie->images->first())
						url({{ asset('storage/images/'.$movie->images->first()->file_name)}})
				@else
						url({{asset('img/default-image.png')}})
				@endif
						">
					<h2 class="">{{ $movie->name }}</h2>
					<a href="{{route('show_movie', $movie->id)}}"><i class="mdi mdi-image-multiple"></i></a>
					<i class="mdi mdi-star rating">{{number_format($movie->rating, 1, '.', '') }}</i>
				</div>
			</div>
		@endforeach

	</div>
	<div class="row">
		<div class="col-12">
			<nav aria-label="Page navigation example ">
				<ul class="pagination justify-content-center">
					{{ $movies->links("pagination::bootstrap-4") }}
				</ul>
			</nav>
		</div>
	</div>
</div>
@endsection