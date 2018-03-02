@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Category</th>
					<th scope="col">Description</th>
					<th scope="col">Author</th>
					<th scope="col">Date</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					@if($loop->index %2 != 0)
						<tr style="background-color: whitesmoke">
							<th>{{$loop->iteration}}</th>
							<td>{{ $category['name'] }}</td>
							<td>{{ $category['description'] }}</td>
							<td>{{ $category->user->name }}</td>
							<td>{{ $category['created_at']}}</td>
							<td>
								<form action="{{route('delete_category', $category->id)}}" method="post">
									<a role="button" class="btn btn-outline-success" href="{{route('edit_category', $category->id)}}">Edit</a>
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn btn-outline-danger">Delete</button>
								</form>
							</td>
						</tr>
					@else
						<tr style="background-color: lightgrey">
							<th>{{$loop->iteration}}</th>
							<td>{{ $category['name'] }}</td>
							<td>{{ $category['description'] }}</td>
							<td>{{ $category->user->name }}</td>
							<td>{{ $category['created_at'] }}</td>
							<td>
								<form action="{{route('delete_category', $category->id)}}" method="post">
									<a role="button" class="btn btn-outline-success" href="{{route('edit_category', $category->id)}}">Edit</a>
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn btn-outline-danger">Delete</button>
								</form>
							</td>
						</tr>
					@endif
				@endforeach
				</tbody>
			</table>
		</div>
		<div>
			<a href="{{route('create_category')}}" role="button" class="btn btn-outline-primary"> Create category</a>
		</div>
	</div>
@endsection