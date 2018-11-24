
@extends('layouts.bg_user')

@section('content')

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Hot product</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Card Title</h4>
            <div class="card-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Popular product</h2>

      <div class="row">
        @foreach( $products as $product)
          <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
              <a href="{{ url('product/' . $product->id) }}"><img class="card-img-top" src="{{ asset('img/products/' . $product->product_image) }}" alt="product" height="350">
                <div class="card-body">
                  <h4 class="card-title">
                    {{ $product->product_name }}
                  </h4>
                  <?php 
                    $sub = substr($product->product_price,-3);
                    $pre = substr($product->product_price,0,-3);
                    $price = $pre . '.' .$sub;
                  ?>
                
                  <p class="card-text" style="color: red"><b>Price: </b>{{ $price }} Đ</p>
                  <p class="card-text"><b>Đánh giá: </b>{{ $product->product_rate}}</p>
                </div>
              </a>
            </div>
          </div>
        @endforeach
        
      </div>
      <!-- /.row -->

      {{ $products->links() }}

      <hr>

      

    </div>
    <!-- /.container -->

    <!-- Footer -->
    
@endsection
