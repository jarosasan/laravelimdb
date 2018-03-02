@extends('layouts.admin')
@section('content')
		<div class="container">
			<form action="{{route('update_movie', $movie->id)}}" method="post" class="forms">
				{{csrf_field()}}
				{{method_field('PUT')}}
				<div class="form-group">
					<label for="exampleInputEmail1" class="bmd-label-floating">Name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $movie->name }}">
					@if($errors->has('name'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('name') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1" class="bmd-label-floating">Description</label>
					<input type="text" name="description" class="form-control" id="exampleInputEmail1" value="{{ $movie->description }}">
					@if($errors->has('description'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('description') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1" class="bmd-label-floating">Year</label>
					<input type="number" name="year" class="form-control" id="exampleInputPassword1" value="{{ $movie->year }}">
					@if($errors->has('year'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('year') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group col-md-4">
					<label for="inputState">Category</label>
					<select id="inputState" class="form-control" name="category_id">
						<option value="{{$movie->category->id}}" selected>{{$movie->category->name}}</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="inputActor">Actors</label>
					<select class="js-example-basic-multiple" name="actor_id[]" multiple="multiple">
						@foreach($selectedActors as $actor)
							<option value="{{$actor->id}}" selected>{{$actor->name}}</option>
						@endforeach
						@foreach($actors as $actor)
							<option value="{{$actor->id}}">{{$actor->name}}</option>
						@endforeach
					</select>
				</div>
				<a href="{{route('admin_movie')}}" class="btn btn-default">Cancel</a>
				<a href="{{route('admin_image_form', $movie->id)}}" class="btn btn-default">Add image</a>
				<button type="submit" class="btn btn-primary btn-raised">Save</button>
			</form>
			<div class="admin-gallery">
				@foreach($movie->images as $image)
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