@extends('layouts.bg_user')


@section('content')
  <style>
    /* Global settings */
   
    .product-image {
      float: left;
      width: 20%;
    }
     
    .product-details {
      float: left;
      width: 37%;
    }
     
    .product-price {
      float: left;
      width: 12%;
    }
     
    .product-quantity {
      float: left;
      width: 10%;
    }
     
    .product-removal {
      float: left;
      width: 9%;
    }
     
    .product-line-price {
      float: left;
      width: 12%;
      text-align: right;
    }
     
    /* This is used as the traditional .clearfix class */
    .group:before, .shopping-cart:before, .column-labels:before, .product:before, .totals-item:before,
    .group:after,
    .shopping-cart:after,
    .column-labels:after,
    .product:after,
    .totals-item:after {
      content: '';
      display: table;
    }
     
    .group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
      clear: both;
    }
     
    .group, .shopping-cart, .column-labels, .product, .totals-item {
      zoom: 1;
    }
     
    /* Apply clearfix in a few places */
    /* Apply dollar signs */
    .product .product-price:after, .product .product-line-price:after, .totals-value:after {
      content: ' đ';
    }
     
    /* Body/Header stuff */
    body {
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-weight: 100;
    }
     
    h1 {
      font-weight: 100;
    }
     
    label {
      color: #aaa;
    }
     
    .shopping-cart {
      margin-top: -25px;
    }
     
    /* Column headers */
    .column-labels label {
      padding-bottom: 15px;
      margin-bottom: 15px;
      border-bottom: 1px solid #eee;
    }
    .column-labels .product-image, .column-labels .product-details, .column-labels .product-removal {
      text-indent: -9999px;
    }
     
    /* Product entries */
    .product {
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }
    .product .product-image {
      text-align: center;
    }
    .product .product-image img {
      width: 100px;
    }
    .product .product-details .product-title {
      margin-right: 20px;
      font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
    }
    .product .product-details .product-description {
      margin: 5px 20px 5px 0;
      line-height: 1.4em;
    }
    .product .product-quantity input {
      width: 40px;
    }
    .product .remove-product {
      border: 0;
      padding: 4px 8px;
      background-color: #c66;
      color: #fff;
      font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
      font-size: 12px;
      border-radius: 3px;
    }
    .product .remove-product:hover {
      background-color: #a44;
    }
     
    /* Totals section */
    .totals .totals-item {
      float: right;
      clear: both;
      width: 100%;
      margin-bottom: 10px;
    }
    .totals .totals-item label {
      float: left;
      clear: both;
      width: 79%;
      text-align: right;
    }
    .totals .totals-item .totals-value {
      float: right;
      width: 21%;
      text-align: right;
    }
    .totals .totals-item-total {
      font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
    }
     
    .checkout {
      float: right;
      border: 0;
      margin-top: 20px;
      margin-bottom: 20px;
      padding: 6px 25px;
      background-color: #6b6;
      color: #fff;
      font-size: 25px;
      border-radius: 3px;
    }
     
    .checkout:hover {
      background-color: #494;
    }
     
    /* Make adjustments for tablet */
    @media screen and (max-width: 650px) {
      .shopping-cart {
        margin: 0;
        padding-top: 20px;
        border-top: 1px solid #eee;
      }
     
      .column-labels {
        display: none;
      }
     
      .product-image {
        float: right;
        width: auto;
      }
      .product-image img {
        margin: 0 0 10px 10px;
      }
     
      .product-details {
        float: none;
        margin-bottom: 10px;
        width: auto;
      }
     
      .product-price {
        clear: both;
        width: 70px;
      }
     
      .product-quantity {
        width: 100px;
      }
      .product-quantity input {
        margin-left: 20px;
      }
     
      .product-quantity:before {
        content: 'x';
      }
     
      .product-removal {
        width: auto;
      }
     
      .product-line-price {
        float: right;
        width: 70px;
      }
    }
    /* Make more adjustments for phone */
    @media screen and (max-width: 350px) {
      .product-removal {
        float: right;
      }
     
      .product-line-price {
        float: right;
        clear: left;
        width: auto;
        margin-top: 10px;
      }
     
      .product .product-line-price:before {
        content: 'Item Total: $';
      }
     
      .totals .totals-item label {
        width: 60%;
      }
      .totals .totals-item .totals-value {
        width: 40%;
      }
    }
  </style>

  <h1>Shopping Cart</h1>
  <br>
   
  <div class="shopping-cart">
   
    <div class="column-labels">
      <label class="product-image">Image</label>
      <label class="product-details">Product</label>
      <label class="product-price">Price</label>
      <label class="product-quantity">Quantity</label>
      <label class="product-removal">Remove</label>
      <label class="product-line-price">Total</label>
    </div>
    <?php $cart = session('cart') ?>
      @if(session()->has('cart'))
        @foreach ( $cart as $product )
          
          <div class="product">
            <div class="product-image">
              <img src="{{asset('img/products/'. $product->product_image )}}">
            </div>
            <div class="product-details">
              <div class="product-title">{{ $product->product_name }}</div>
              <?php 
                $desc = substr($product->product_description,0,100);
              ?>
              <p class="product-description"> {{ $desc }}... </p>
            </div>
            <?php 
              $sub = substr($product->product_price,-3);
              $pre = substr($product->product_price,0,-3);
              $price = $pre . '.' .$sub;
            ?>
            <div class="product-price">{{ $price }} </div>
            <div class="product-quantity">
              <input type="number" value="{{ $product->quantity }}" min="1">
            </div>
            <div class="product-removal">
              <button class="remove-product">
                Remove
              </button>
            </div>
            <?php 
              $total = $product->product_price * $product->quantity;
              $sub = substr($total,-3);
              $pre = substr($total,0,-3);
              $price = $pre . '.' .$sub;
            ?>
            <div class="product-line-price">{{ $price }}</div>
          </div>
        @endforeach 
            
      @endif
    
 
   
    <div class="totals">
      <div class="totals-item">
        <label>Subtotal</label>
        <div class="totals-value" id="cart-subtotal"></div>
      </div>
      <div class="totals-item">
        <label>Tax (5%)</label>
        <div class="totals-value" id="cart-tax"></div>
      </div>
      <div class="totals-item totals-item-total">
        <label>Grand Total</label>
        <div class="totals-value" id="cart-total"></div>
      </div>
    </div>
         
    <button class="checkout">Checkout</button>
  </div>
  <script>
    
    $(document).ready(function() {
      
      /* Set rates + misc */
      var taxRate = 0.05;
      var fadeTime = 300;
     
     
      /* Assign actions */
      $('.product-quantity input').change( function() {
        updateQuantity(this);
      });
       
      $('.product-removal button').click( function() {
        removeItem(this);
      });
       
       
      /* Recalculate cart */
      function recalculateCart()
      {
        var subtotal = 0;
         
        /* Sum up row totals */
        $('.product').each(function () {
          subtotal += parseFloat($(this).children('.product-line-price').text());
        });
         
        /* Calculate totals */
        var tax = subtotal * taxRate;
        var total = subtotal + tax ;
         
        /* Update totals display */
        $('.totals-value').fadeOut(fadeTime, function() {
          $('#cart-subtotal').html(subtotal.toFixed(3));
          $('#cart-tax').html(tax.toFixed(3));
          $('#cart-total').html(total.toFixed(3));
          if(total == 0){
            $('.checkout').fadeOut(fadeTime);
          }else{
            $('.checkout').fadeIn(fadeTime);
          }
          $('.totals-value').fadeIn(fadeTime);
        });
      }
       
       
      /* Update quantity */
      function updateQuantity(quantityInput)
      {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.product-price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;
         
        /* Update line price display and recalc cart totals */
        productRow.children('.product-line-price').each(function () {
          $(this).fadeOut(fadeTime, function() {
            $(this).text(linePrice.toFixed(3));
            recalculateCart();
            $(this).fadeIn(fadeTime);
          });
        });  
      }
       
       
      /* Remove item from cart */
      function removeItem(removeButton)
      {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function() {
          productRow.remove();
          recalculateCart();
        });
      }
      recalculateCart() 
    });
     
  </script>
@endsection