@extends('layouts.bg_user')

@section('content')
	<div class="container-fluid">
		<br>
		<h4>{{ $product->product_name}}</h4>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<div class="container text-md-center">
					<img src="{{ asset('img/products/' . $product->product_image ) }}" height="500" alt="image product">	
				</div>
			</div>
			<div class="col-md-6">
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
						<button class="btn btn-warning" style="width: 100%">Mua ngay</button>
					</div>
					<div class="col-md-6">
						<button class="btn btn-danger" style="width: 100%">Thêm vào giỏ</button>
					</div>
				</div>
			</div>		
			<div class="col-md-2">
				<h4>Sidebar ckeckout</h4>
			</div>
		</div>
		<hr><br>
	</div>
	

@endsection