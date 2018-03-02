@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<thead>
				<tr style="background-color: #003e80">
					<th scope="col">#</th>
					<th scope="col">Image</th>
					<th scope="col">Name</th>
					<th scope="col">BirthDay</th>
					<th scope="col">DeathDay</th>
					<th scope="col">Created</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($actors as $actor)
					@if($loop->index %2 != 0)
						<tr style="background-color: whitesmoke" id="admin-table">
							<th>{{$loop->iteration}}</th>

							@if($actor->images->first())
								<td><img src="{{ asset('storage/images/'.$actor->images->first()->file_name)}}" alt="{{ $actor['name'] }}"></td>
							@else
								<td><img src="{{asset('img/default-image.png')}}" alt="no image"></td>
							@endif
							<td>{{ $actor['name'] }} {{ $actor['surname'] }}</td>
							<td>{{ $actor['birth_day'] }}</td>
							<td>
							@if($actor['death_day'])
								{{$actor['death_day']}}
							@else
								-
							@endif
							</td>
							<td>{{ $actor['created_at'] }}</td>
							<td>
								<form action="{{route('delete_actor', $actor->id)}}" method="post">
									<a role="button" class="btn btn-outline-success" href="{{route('edit_actor', $actor->id)}}">Edit</a>
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn btn-outline-danger">Delete</button>
								</form>
							</td>
						</tr>
					@else
						<tr style="background-color: lightgrey" id="admin-table">
							<th>{{$loop->iteration}}</th>
							@if($actor->images->first())
								<td><img src="{{ asset('storage/images/'.$actor->images->first()->file_name)}}" alt="{{ $actor['name'] }}"></td>
							@else
								<td><img src="{{asset('img/default-image.png')}}" alt="no image"></td>
							@endif
							<td>{{ $actor['name'] }} {{ $actor['surname'] }}</td>
							<td>{{ $actor['birth_day'] }}</td>
							<td>
								@if($actor['death_day'])
									{{$actor['death_day']}}
								@else
									-
								@endif
							</td>
							<td>{{ $actor['created_at'] }}</td>
							<td>
								<form action="{{route('delete_actor', $actor->id)}}" method="post">
									<a role="button" class="btn btn-outline-success" href="{{route('edit_actor', $actor->id)}}">Edit</a>
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
			<a href="{{route('create_actor')}}" role="button" class="btn btn-outline-primary"> Add actor</a>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				{{ $actors->links("pagination::bootstrap-4") }}
			</ul>
		</nav>
	</div>
@endsection