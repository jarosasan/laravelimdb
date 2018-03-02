<div class="container">
	<nav class="navbar justify-content-between">
		<ul class="nav nav-tabs ">
			<li class="nav-item">
				<a class="nav-link " href="{{route('admin_movie')}}">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin_category') }}">Categories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('admin_movie') }}">Movies</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="{{route('admin_actors')}}">Actors</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="{{route('admin_users')}}">Users</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0 te float-right">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
		</form>
	</nav>
</div>
