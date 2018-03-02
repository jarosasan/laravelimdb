@extends('layouts.admin')
@section('content')
		<div class="container">
			<form action="{{route('store_actor')}}" method="post" class="forms">
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
					<label for="exampleInputPassword1" class="bmd-label-floating">Birthday</label>
					<input type="date" name="birth_day" class="form-control" id="exampleInputPassword1" value="{{ old('birthday') }}">
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
					<input type="date" name="death_day" class="form-control" id="exampleInputPassword1" value="{{old('deathday')}}">
					@if($errors->has('deathday'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('deathday') }}
							</small>
						</div>
					@endif
				</div>
				<div class="form-group col-md-4">
					<label for="inputActor">Movies</label>
					<select class="js-example-basic-multiple" name="mivie_id[]" multiple="multiple">
						<option selected>Choose...</option>
						@foreach($movies as $movie)
							<option value="{{$movie->id}}">{{$movie->name}}</option>
						@endforeach
					</select>
				</div>
				<a href="{{route('admin_actors')}}" class="btn btn-default">Cancel</a>
				<button type="submit" class="btn btn-primary btn-raised">Save</button>
			</form>
		</div>
@endsection