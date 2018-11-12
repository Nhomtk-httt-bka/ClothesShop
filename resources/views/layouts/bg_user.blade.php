<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clothes Store</title>
    
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
  
  </head>
    
  <body>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @include('component.navbar_user')
    <div style="margin: 6px;"></div>
    @if(Request::is('home'))
      @include('component.slide_show')
    @endif
    
    <div class="row">
        @if(Request::is('home'))
            <div class="col-md-2 border border-dark rounded border-left-0">
                @include('component.sidebar_user')
            </div>
            <div class="col-md-10">
        @endif
            @yield('content')
        </div>
    </div>
    
    <!-- The Modal -->
    <div class="modal fade" id="cart">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal header -->
          <div class="modal-header">
            <h4 class="modal-title">Shopping Cart </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            Cart body.......
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Checkout</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @include('component.footer_user')
  </body>
    
</html>




