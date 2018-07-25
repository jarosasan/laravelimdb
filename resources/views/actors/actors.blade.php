@extends('layouts.app')
@section('content');
<div class="container">
	<div class="row">
		@foreach($actors as $actor)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 actors">
                    <a href="{{route('show_actor', $actor->id)}}">
                        <div class="cat-box col-12" style="background-size: cover; background-image:
                        @if($actor->images->first())
                                url({{ asset('storage/images'.$actor->images->first()->file_name)}})
                        @else
                                url({{asset('img/default-image.png')}})
                        @endif
                                ">
                            <h3>{{$actor->name}}</h3>
                        </div>
                    </a>
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