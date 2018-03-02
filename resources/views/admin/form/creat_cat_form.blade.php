@extends('layouts.admin')
@section('content')
			<div class="container">
				<form action="{{route('store_category')}}" method="post" class="forms">
					{!! csrf_field() !!}
					{!! method_field('POST') !!}
					<div class="form-group">
						<label for="exampleFormControlInput1"></label>
						<textarea name="name" class="form-control"  rows="1">{{ old('name') }}</textarea>
						@if($errors->has('name'))
							<div class="col">
								<small id="passwordHelp" class="text-danger">
									{{ $errors->first('name') }}
								</small>
							</div>
						@endif
					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Text</label>
						<textarea name="description" class="form-control"  rows="2">{{ old('description') }}</textarea>
						@if($errors->has('content'))
							<div class="col">
								<small id="passwordHelp" class="text-danger">
									{{ $errors->first('description') }}
								</small>
							</div>
						@endif
					</div>
					<button type="submit" role="button" class="btn btn-outline-success">Save</button>
					{{--<a href="{{ route('delete', $post->id) }}" role="button" class="btn btn-outline-danger">Delete</a>--}}

				</form>
			</div>
@endsection