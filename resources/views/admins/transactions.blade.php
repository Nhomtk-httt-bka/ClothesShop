@extends('layouts.bg_admin')

@section('content')
	<!-- SHOW EMPLOYEES-->
	<div >
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        List of Transactions</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Total money</th>
                <th>Trạng thái</th>
                <th></th>
                <th>Update at</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)
                <tr>
                   <td>{{ $transaction->user->first_name }} {{ $transaction->user->last_name }}</td>
                   <td>{{ $transaction->user->user_phone }}</td>
                   <td>{{ $transaction->user->user_address }}</td>
                   <td>{{ $transaction->total_money}}</td> 
                   <td>
                    <form action="{{ url('transactions/' . $transaction->id) }}" method="post" id="{{$transaction->id}}/1">
                      @csrf
                      @method('PUT')
                      
                      <input type="hidden" name="status" value="1">
                    </form>
                    <form action="{{ url('transactions/' . $transaction->id) }}" method="post" id="{{$transaction->id}}/2">
                      @csrf
                      @method('PUT')
                      
                      <input type="hidden" name="status" value="2">
                    </form>    
                    @if( $transaction->status == 1 )
                      <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu{{ $transaction->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Chưa hoàn thành
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $transaction->id }}">
                          <button class="dropdown-item" type="submit" form="{{ $transaction->id }}/2">Đã hoàn thành</button>
                        </div>
                      </div>
                    @else
                      <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu{{ $transaction->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Đã hoàn thành
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu{{ $transaction->id }}">
                          <button class="dropdown-item" type="submit" form="{{ $transaction->id }}/1">Chưa hoàn thành</button>
                        </div>
                      </div>
                    @endif
                   </td> 
                   <td>

                      <a href="{{ url('transactions/' . $transaction->id) }}" class="btn text-white bg-info clearfix small z-1">
                        View Details
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="">
                          <i class="fas fa-angle-right"></i>
                        </span>
                      </a>
                   </td>
                   <td>
                     {{ $transaction->updated_at }}
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


