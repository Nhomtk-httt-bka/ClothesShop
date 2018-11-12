<div class="container">
	<h2 class="my-4">Category</h2>	
	<ul class="navbar-nav ml-auto">
        @foreach( $categories as $category )
			<li class="nav-item category">
	          	<a class="nav-link" href="">{{ $category->category_name }}</a>
	        </li>
		@endforeach
    </ul>
</div>


