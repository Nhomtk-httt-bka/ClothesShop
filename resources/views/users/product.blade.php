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
				<h4>
					<span class="text-danger">Trạng thái: </span>
					@if($product->product_condition == 0 )
						ngừng kinh doanh
					@elseif($product->product_condition == 1)
						đang kinh doanh  
					@elseif($product->product_condition == 2)
						đang hết hàng
					@endif
				</h4>	
				
				<!-- Search Widget -->
		        <div class="card mb-4">
		            <h5 class="card-header">Content</h5>
		            <div class="card-body">
		              <div class="input-group">
		                <h4>{{ $product->product_content }}</h4>
		              </div>
		            </div>
		        </div>
				<input class="form-control" type="text" value="{{ $product->product_quantity }}" readonly>
				<br>
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
		
			
		<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	  	<script>
	          tinymce.init({
	              selector: "textarea",
	              plugins: [
	                  "advlist autolink lists link image charmap print preview anchor",
	                  "searchreplace visualblocks code fullscreen",
	                  "insertdatetime media table contextmenu paste"
	              ],
	              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	          });
	  	</script>
		
		<div class="comments">
			<div class="comment-wrap">
				<div class="photo">
					@auth
          				<div class="avatar" style="background-image: url('{{ asset('storage/' . Auth::user()->user_image) }}'); background-size: cover;"></div>
        			@endauth
					
				</div>
				<div class="comment-block">
					<form action="">
						@auth
							<textarea name="" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
							<br>
							<button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Comment</button>
						@endauth
					</form>
				</div>
			</div>
			<div class="comment-wrap">
				<div class="photo">
					<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>
				</div>
				<div class="comment-block">
					<p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam reprehenderit quasi
							sapiente modi tempora at perspiciatis mollitia, dolores voluptate. Cumque, corrupti?</p>
					<div class="bottom-comment">
						<div class="comment-date">Aug 24, 2014 @ 2:35 PM</div>
							
					</div>
				</div>
			</div>
			<div class="comment-wrap">
				<div class="photo">
					<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg')"></div>
				</div>
				<div class="comment-block">
					<p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam.</p>
					<div class="bottom-comment">
						<div class="comment-date">Aug 23, 2014 @ 10:32 AM</div>
						<ul class="comment-actions">
								<li class="complain">Complain</li>
								<li class="reply">Reply</li>
						</ul>
					</div>
				</div>
			</div>
			

		</div>
			  
		<br>
	</div>


@endsection