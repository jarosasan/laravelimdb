@extends('layouts.app')
@section('content')
		<div class="container">
			<form action="{{route('store_admin_movie_images', $id)}}" method="post" class="forms" enctype="multipart/form-data">
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
				<a href="{{route('edit_movie', $id)}}" class="btn btn-default">Cancel</a>
				<button type="submit" class="btn btn-primary btn-raised">Save</button>
			</form>
		</div>
@endsection