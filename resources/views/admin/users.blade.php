@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			<table class="table">
				<thead>
				<tr style="background-color: #003e80">
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Role</th>
					<th scope="col">Created</th>
					<th scope="col">Updated</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					@if($loop->index %2 != 0)
						<tr style="background-color: whitesmoke" id="admin-table">
							<th>{{$loop->iteration}}</th>
							<th>{{$user->name}}</th>
							<th>{{$user->email}}</th>
							<th>{{$user->role}}</th>
							<th>{{$user->created_at}}</th>
							<th>{{$user->updated_at}}</th>
							<td>
								<a role="button" class="btn btn-outline-success" href="{{route('edit_user', $user->id)}}">Edit</a>
							</td>
						</tr>
					@else
						<tr style="background-color: whitesmoke" id="admin-table">
							<th>{{$loop->iteration}}</th>
							<th>{{$user->name}}</th>
							<th>{{$user->email}}</th>
							<th>{{$user->role}}</th>
							<th>{{$user->created_at}}</th>
							<th>{{$user->updated_at}}</th>
							<td>
								<a role="button" class="btn btn-outline-success" href="{{route('edit_user', $user->id)}}">Edit</a>
							</td>
						</tr>
					@endif
				@endforeach
				</tbody>
			</table>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				{{ $users->links("pagination::bootstrap-4") }}
			</ul>
		</nav>
	</div>
@endsection