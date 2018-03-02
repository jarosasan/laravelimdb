@extends('layouts.admin')
@section('content')
		<div class="container">
			<form action="{{route('update_actor', $actor->id)}}" method="post" class="forms">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label for="exampleInputEmail1" class="bmd-label-floating">Name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $actor->name }}">
					@if($errors->has('name'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('name') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1" class="bmd-label-floating">Birthday</label>
					<input type="date" name="birth_day" class="form-control" id="exampleInputPassword1" value="{{$actor->birth_day}}">
					@if($errors->has('birthday'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('birthday') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1" class="bmd-label-floating">Deathday</label>
					<input type="date" name="death_day" class="form-control" id="exampleInputPassword1" value="{{$actor->death_day}}">
					@if($errors->has('deathday'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('deathday') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="inputActor">Movies</label>
					<div>
						<select class="js-example-basic-multiple" name="actor_id[]" multiple="multiple">
							@foreach($selectedMovies as $movie)
								<option value="{{$movie->id}}" selected>{{$movie->name}}</option>
							@endforeach
							@foreach($movies as $movie)
								<option value="{{$movie->id}}">{{$movie->name}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<a href="{{route('admin_actors')}}" class="btn btn-default">Cancel</a>
				<a href="{{route('create_actors_image', $actor->id)}}" class="btn btn-default">Add image</a>
				<button type="submit" class="btn btn-primary btn-raised">Save</button>
			</form>
			<div class="admin-gallery">
				@foreach($actor->images as $image)
					<img src="{{asset('storage/images/'.$image->file_name)}}" alt="...">
					<form action="{{route('delete_image', $image->id)}}" method="post">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button type="submit" class="btn btn-outline-danger">Delete</button>
					</form>
				@endforeach
			</div>
		</div>
@endsection