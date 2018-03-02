@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<thead>
				<tr style="background-color: #003e80">
					<th scope="col">#</th>
					<th scope="col">Image</th>
					<th scope="col">Movie</th>
					<th scope="col">Category</th>
					<th scope="col">Year</th>
					<th scope="col">Raiting</th>
					<th scope="col">Created</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($movies as $movie)
					@if($loop->index %2 != 0)
						<tr style="background-color: whitesmoke" id="admin-table">
							<th>{{$loop->iteration}}</th>

							@if($movie->images->first())
								<td><img src="{{ asset('storage/images/'.$movie->images->first()->file_name)}}" alt="{{ $movie['name'] }}"></td>
							@else
								<td><img src="{{asset('img/default-image.png')}}" alt="no image"></td>
							@endif
							<td>{{ $movie['name'] }}</td>
							<td>{{ $movie->category->name }}</td>
							<td>{{ $movie['year'] }}</td>
							<td>{{ $movie['rating'] }}</td>
							<td>{{ $movie['created_at'] }}</td>
							<td>
								<form action="{{route('delete_movie', $movie->id)}}" method="post">
									<a role="button" class="btn btn-outline-success" href="{{route('edit_movie', $movie->id)}}">Edit</a>
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn btn-outline-danger">Delete</button>
								</form>
							</td>
						</tr>
					@else
						<tr style="background-color: lightgrey" id="admin-table">
							<th>{{$loop->iteration}}</th>
							@if($movie->images->first())
								<td><img src="{{ asset('storage/images/'.$movie->images->first()->file_name)}}" alt="{{ $movie['name'] }}"></td>
							@else
								<td><img src="{{asset('img/default-image.png')}}" alt="no image"></td>
							@endif
							<td>{{ $movie['name'] }}</td>
							<td>{{ $movie->category->name }}</td>
							<td>{{ $movie['year'] }}</td>
							<td>{{ $movie['rating'] }}</td>
							<td>{{ $movie['created_at'] }}</td>
							<td>
								<form action="{{route('delete_movie', $movie->id)}}" method="post">
									<a role="button" class="btn btn-outline-success" href="{{route('edit_movie', $movie->id)}}">Edit</a>
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
			<a href="{{route('create_movie')}}" role="button" class="btn btn-outline-primary"> Add movie</a>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				{{ $movies->links("pagination::bootstrap-4") }}
			</ul>
		</nav>
	</div>
@endsection