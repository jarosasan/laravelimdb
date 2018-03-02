@extends('layouts.admin')
@section('content')
			<div class="col-md-6 ">
				<form action="{{route('update_category', $category->id)}}" method="post">
					{!! csrf_field() !!}
					{!! method_field('PUT') !!}
					<div class="form-group">
						<label for="exampleFormControlInput1"></label>
						<textarea name="name" class="form-control"  rows="1">{{ $category->name }}</textarea>
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
						<textarea name="description" class="form-control"  rows="2">{{ $category->description }}</textarea>
						@if($errors->has('content'))
							<div class="col">
								<small id="passwordHelp" class="text-danger">
									{{ $errors->first('description') }}
								</small>
							</div>
						@endif
					</div>
					<button type="submit" role="button" class="btn btn-outline-success">Save</button>
				</form>
			</div>
@endsection