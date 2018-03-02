@extends('layouts.app')
@section('content');
	<div class="container">
		<div class="row">
		@foreach($categories as $category)
			<div class="cat-box col-3" >
				<h5 class="">{{ $category->name }}</h5>
				<p class="">{{ $category->description }}</p>
				<a href="{{route('movie_from_category', $category->id)}}" class="btn btn-primary btn-block">Show movies</a>
			</div>
		@endforeach
		</div>
		<div class="row">
			<div class="col-12">
				<nav aria-label="Page navigation example ">
					<ul class="pagination justify-content-center">
						{{ $categories->links("pagination::bootstrap-4") }}
					</ul>
				</nav>
			</div>
		</div>
	</div>
@endsection