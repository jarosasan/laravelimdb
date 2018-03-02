@extends('layouts.app')
@section('content')
		<div class="container">
			<form action="{{route('store_actor_image', $id)}}" method="post" class="forms" enctype="multipart/form-data">
				{{csrf_field()}}
				{{method_field('POST')}}
				<div class="form-group">
					<label for="exampleInputFile" class="bmd-label-floating">Image input</label>
					<input type="file"  name="file" class="form-control-file" id="exampleInputFile">
					@if($errors->has('file'))
						<div class="col">
							<small id="passwordHelp" class="text-danger">
								{{ $errors->first('file') }}
							</small>
						</div>
					@endif
				</div>
				<a href="{{route('show_actor', $id)}}" role="button" class="btn btn-default">Cancell</a>
				<button type="submit" class="btn btn-primary btn-raised">Save</button>
			</form>
		</div>
@endsection