@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		@foreach($movies as $movie)
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mov">
				<div class="movie-item">
					<a href="{{route('show_movie', $movie->id)}}">
						<div class="row">
							<div class="cat-box col-12" style= "background-size:cover; background-image:
							@if($movie->images->first())
									url({{ asset('storage/images/'.$movie->images->first()->file_name)}})
							@else
									url({{asset('img/default-image.png')}})
							@endif
									">
							</div>
						</div>
						<div class="row">
							<div class="col-12 item-title">
								<div class="row">
									<div class="col-8">
										<h2 class="">{{ $movie->name }}</h2>
									</div>
									<div class="col-4">
										<i class="mdi mdi-star">{{number_format($movie->rating, 1,'.','') }}</i>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination">
			{{ $movies->links("pagination::bootstrap-4") }}
		</ul>
	</nav>
</div>
@endsection