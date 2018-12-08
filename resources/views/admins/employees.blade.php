@extends('layouts.bg_admin')

@section('content')
	<!-- SHOW EMPLOYEES-->
	<div >
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Danh sách người bán hàng</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr>
                   <td>{{ $employee->id }}</td>
                   <td>{{ $employee->admin_name }}</td>
                   <td>{{ $employee->admin_email }}</td>
                   <td>{{ $employee->admin_phone }}</td>
                   <td>

                   	@if( $employee->admin_status == 1)
                    <a class="btn text-white bg-danger clearfix small z-1" href="{{ url('employees/block/'.$employee->id) }}">
                        Khóa
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="">
                          <i class="fas fa-angle-right"></i>
                        </span>
                      </a>
                      @else
                      <a class="btn text-white bg-success clearfix small z-1" href="{{ url('employees/unblock/'.$employee->id) }}">
                        Bỏ khóa
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="">
                          <i class="fas fa-angle-right"></i>
                        </span>
                      </a>
                      @endif

                   </td>
                   <td>
                      <button class="btn text-white bg-info clearfix small z-1" onclick="get_employee_detail(<?php echo $employee->id; ?>)" >
                        Xem chi tiết    
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="">
                          <i class="fas fa-angle-right"></i>
                        </span>
                      </button>
                   </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>

  	<!-- Add employee-->
  	<div class="card mx-auto mt-6">
      <div class="card-header"><b>Thêm người bán hàng</b></div>

      		@if($errors->has('employee_name'))
			 			<p style="color: red">{{$errors->first('employee_name')}}</p>
			 		@endif
			@if($errors->has('employee_email'))
			 			<p style="color: red">{{$errors->first('employee_email')}}</p>
			 		@endif
			@if($errors->has('employee_phone'))
			 			<p style="color: red">{{$errors->first('employee_phone')}}</p>
			 		@endif
			 @if($errors->has('message'))
			 			<p style="color: red">{{$errors->first('message')}}</p>
			 		@endif
		
        	
      <form action="{{ url('employees') }}" method="post"> 
        @csrf
        <div class="card-body text-center">
			
          	<div class="form-group">
            	<div class="form-label-group">
              		<input name="employee_name" type="text" id="name" class="form-control" placeholder="Employee name" required="required" autofocus="autofocus" value="{{old('employee_name')}}">
              		<label for="name">Họ tên</label>
            	</div>
        	</div>
        


        	<div class="form-group">
            	<div class="form-label-group">
              		<input name="employee_email" type="text" id="email" class="form-control" placeholder="Employee email" required="required" autofocus="autofocus" value="{{old('employee_email')}}">
              		<label for="email">Email</label>
            	</div>
        	</div>

        	<div class="form-group">
            	<div class="form-label-group">
              		<input name="employee_phone" type="text" id="phone" class="form-control" placeholder="Phone" required="required" autofocus="autofocus" value="{{old('employee_phone')}}">
              		<label for="phone">Số điện thoại</label>
            	</div>
        	</div>
        </div>
        <div class="form-group">
        	<div class="form-lable-group">
        		<label style="padding-left: 20px; color: green">Ghi chú: Mật khẩu mặc định là 123</label>
        	</div>
        </div>
  		
        		
       
        	<div class="card-footer text-right">
        		
          <button type="submit" class="btn btn-success text-right" style="font-size: 30px">   <i class="fas fa-save"> Lưu</i></button>
        </div>
     
      </form>

    </div>
 



 	<!-- Show detail modal-->
 	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>
          <div class="form-group">
            <label  class="col-form-label">Name</label>
            <input id="inp-name" type="text" class="form-control" disabled>
          </div>
          <div class="form-group">
            <label  class="col-form-label">Email</label>
            <input id="inp-email" type="text" class="form-control"  disabled>
          </div>
          <div class="form-group">
            <label  class="col-form-label">Phone</label>
            <input id="inp-phone" type="text" class="form-control"   disabled>
          </div>
          
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<script>
	function get_employee_detail(id){

		$.ajax(
    {
    url: "employees/"+id,
    type: "GET",

    data: { 'id': id},
    success: function (result) {
    	result = JSON.parse(result);
        $("#inp-name").val(result.admin_name);
        $("#inp-email").val(result.admin_email);
        $("#inp-phone").val(result.admin_phone);
        $('#exampleModal').modal('show');   
    }
});   
	}
</script>

@endsection


