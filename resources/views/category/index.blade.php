@extends('layouts.app')
@section('content');
	<div class="container">
		<div class="row">
		@foreach($categories as $category)
			<div class="col-2 cel">
				<a href="{{route('movie_from_category', $category->id)}}" class="">
					<div class="categories text-center " >
						<h5 class="">{{ $category->name }}</h5>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
@endsection