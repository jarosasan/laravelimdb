<div class="container">
	<nav class="navbar justify-content-between">
		<ul class="nav nav-tabs ">
			<li class="nav-item">
				<a class="nav-link " href="{{route('home')}}">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('category') }}">Categories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('movies') }}">Movies</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="{{route('actors')}}">Actors</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0 te float-right" action="{{route('search_movies')}}" method="post">
			{{csrf_field()}}
			{{method_field('POST')}}
			<input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
		</form>
	</nav>
</div>
