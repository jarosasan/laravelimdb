@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		@foreach($actors as $actor)
			<div class="col-3">
				<div class="cat-box" style="background-size: cover; background-image:
				@if($actor->images->first())
						url({{ asset('storage/images'.$actor->images->first()->file_name)}})
				@else
						url({{asset('img/default-image.png')}})
				@endif
						">
					<h2 class="">{{ $actor->name }}</h2>
					<a href="{{route('show_actor', $actor->id)}}"><i class="mdi mdi-image-multiple"></i></a>
				</div>
			</div>
		@endforeach

	</div>
	<div class="row">
		<div class="col-12">
			<nav aria-label="Page navigation example ">
				<ul class="pagination justify-content-center">
					{{ $actors->links("pagination::bootstrap-4") }}
				</ul>
			</nav>
		</div>
	</div>

</div>
@endsection