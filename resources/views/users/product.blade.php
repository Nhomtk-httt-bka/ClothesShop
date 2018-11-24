@extends('layouts.bg_user')

@section('content')
	<div class="container-fluid">
		<br>
		@if($errors->any())
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{$errors->first()}}</strong>
          </div>
        @endif
        @if(session()->has('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('success') }}</strong>
          </div>
        @endif
		<h4>{{ $product->product_name}}</h4>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<div class="container text-md-center">
					<img src="{{ asset('img/products/' . $product->product_image ) }}" height="500" width="100%" alt="image product">	
				</div>
			</div>
			<div class="col-md-6">
				<h4 class="text-danger">Trạng thái: </h4>
				<!-- Search Widget -->
		        <div class="card mb-4">
		            <h5 class="card-header">Content</h5>
		            <div class="card-body">
		              <div class="input-group">
		                <h4>{{ $product->product_content}}</h4>
		              </div>
		            </div>
		        </div>
				<h4>{{ $product->product_quantity }}</h4>
				<div class="row">
					<div class="col-md-6">
						<a class="btn btn-warning" style="width: 100%" href="">Mua ngay</a>
					</div>
					<div class="col-md-6">
						<form action="{{ url('carts') }}" method="post">
							@csrf
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							<button class="btn btn-danger" style="width: 100%">Thêm vào giỏ</button>	
						</form>
						
					</div>
				</div>
				
			</div>		
			<div class="col-md-2">
				<h4>Sidebar ckeckout</h4>
			</div>
		</div>

		<hr><br>
		
		<div class="container-fluid">
			<div class="card text-white bg-info mb-3" style="max-width: 100rem;">
			  <div class="card-header">Description</div>
			  <div class="card-body">
			    
			    <p class="card-text">{{ $product->product_description }}</p>
			  </div>
			</div>
		</div>
		<br>
	</div>


@endsection