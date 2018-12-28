@extends('layouts.bg_admin')

@section('content')

  <!-- SHOW Orders-->
	<div >
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        List Orders of Transaction</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tên Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá 1 sản phẩm</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaction->orders as $order)
                <tr>
                   <td>{{ $order->product->product_name }}</td>
                   <td>{{ $order->quantity }}</td>
                   <td>{{ $order->price }}</td> 
                   <td>
                    <form action="{{ url('orders/' . $order->id) }}" method="post" id="{{$order->id}}/1">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="order_id" value="{{ $order->id }}">
                      <input type="hidden" name="status" value="1">
                    </form>
                    <form action="{{ url('orders/' . $order->id) }}" method="post" id="{{$order->id}}/2">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="order_id" value="{{ $order->id }}">
                      <input type="hidden" name="status" value="2">
                    </form>
                    <form action="{{ url('orders/' . $order->id) }}" method="post" id="{{$order->id}}/3">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="order_id" value="{{ $order->id }}">
                      <input type="hidden" name="status" value="3">
                    </form>
                      @if( $order->status == 1 )
                        <div class="dropdown">
                          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu{{ $order->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Đang xử lý
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $order->id }}">
                            <button class="dropdown-item" type="submit" form="{{ $order->id }}/2">Đang giao hàng</button>
                            <button class="dropdown-item" type="submit" form="{{ $order->id }}/3">Đã hoàn thành</button>
                          </div>
                        </div>
                      @elseif( $order->status == 2 )
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu{{ $order->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Đang giao hàng
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $order->id }}">
                            <button class="dropdown-item" type="submit" form="{{ $order->id }}/1">Đang xử lý</button>
                            <button class="dropdown-item" type="submit" form="{{ $order->id }}/3">Đã hoàn thành</button>
                          </div>
                        </div>

                      @else
                        <div class="dropdown">
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu{{ $order->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Đã hoàn thành
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $order->id }}">
                            <button class="dropdown-item" type="submit" form="{{ $order->id }}/1">Đang xử lý</button>
                            <button class="dropdown-item" type="submit" form="{{ $order->id }}/2">Đang giao hàng</button>
                          </div>
                        </div>

                      @endif  
                    
                    
                   </td> 

                   
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>
 	
</div>

@endsection


