@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 ">
				<form action="{{route('update_user', $user->id)}}" method="post">
					{!! csrf_field() !!}
					{!! method_field('PUT') !!}
					<div class="form-group">
						<label for="exampleFormControlInput1"></label>
						<textarea name="role" class="form-control"  rows="1">{{ $user->role }}</textarea>
						@if($errors->has('role'))
							<div class="col">
								<small id="passwordHelp" class="text-danger">
									{{ $errors->first('role') }}
								</small>
							</div>
						@endif
					</div>
					<button type="submit" role="button" class="btn btn-outline-success">Save</button>
				</form>
			</div>
		</div>
	</div>
@endsection