@extends('layouts.admin')
@section('content')
		<div class="container">
			<form action="{{route('store_movie')}}" method="post" class="forms">
				{{csrf_field()}}
				{{method_field('POST')}}
				<div class="form-group">
					<label for="exampleInputEmail1" class="bmd-label-floating">Name</label>
					<input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}">
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
					<input type="text" name="description" class="form-control" id="exampleInputEmail1" value="{{ old('description') }}">
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
					<input type="number" name="year" class="form-control" id="exampleInputPassword1" value="{{ old('year') }}">
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
						<option selected>Choose...</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="inputActor">Actors</label>
					<select class="js-example-basic-multiple" name="actor_id[]" multiple="multiple">
						<option selected>Choose...</option>
						@foreach($actors as $actor)
							<option value="{{$actor->id}}">{{$actor->name}} {{$actor->surname}}</option>
						@endforeach
					</select>
				</div>


				<button class="btn btn-default"><a href="{{route('movies')}}"></a>Cancel</button>
				<button type="submit" class="btn btn-primary btn-raised">Save</button>
			</form>
		</div>
@endsection