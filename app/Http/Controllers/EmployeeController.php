<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
       $employees = Admin::all()->where('admin_status', 1);
       return view('admins/employees',['employees'=>$employees]);
    }

    public function create(){

    }

    public function store(Request $request)
    {
    	$all_employee = Admin::all()->where('admin_status', 1);

    	$rules =[
    		'employee_name'=> 'required | min:3',
    		'employee_phone'=> 'required | numeric',
    		'employee_email'=>'required | email'
    	];

    	$message = [
    		'employee_name.required' => '* Tên là trường bắt buộc',
    		'employee_name.min'=> '* Tên có độ dài tối thiểu là 3 ký tự',
    		'employee_phone.required' => '* Phone là trường bắt buộc',
    		'employee_phone.numeric' => '* Số điện thoại chỉ bao gồm các chữ số',
    		'employee_email.required' => '* Email là trường bắt buộc',
    		'employee_email.email'=> '* Email vừa nhập không đúng định dạng'
    	];

    	$validator = Validator::make($request->all(), $rules, $message);
    	
    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator)->withInput();
    	}
    	else{
    		$msg_name = '* Tên đăng nhập đã tồn tại';
    		$msg_phone = '* Số điện thoại đã tồn tại';
    		$msg_email = '* Email đã tồn tại';

  			$name = $request->employee_name;
  			$phone = $request->employee_phone;
  			$email = $request->employee_email;

  			if(count(Admin::all()->where('admin_name', $name)) != 0)
  				return view('admins/employees', ['message'=>$msg_name, 'employees' => $all_employee]);

  			if(count(Admin::all()->where('admin_email', $email)) != 0)
  				return view('admins/employees', ['message'=>$msg_email, 'employees' => $all_employee]);

  			if(count(Admin::all()->where('admin_phone', $phone)) != 0)
  				return view('admins/employees', ['message'=>$msg_phone, 'employees' => $all_employee]);


        	Admin::create([
            'admin_name' => $name,
            'password' => Hash::make(123), // default password is 123
            'admin_phone' => $phone,
            'admin_email' => $email,
            'admin_status' => 1 // 1 is admin, 0 is employee
            
        	]);	
       
        	return redirect('employees');
    	}
    }

    public function show($id)
    {
      	$emp = Admin::find($id);
      	echo $emp;
    }

    public function edit($id){
    	$employee = Admin::find($id);

    	$employee->admin_status = 0;
    	$employee->save();
    	return redirect("employees");
    }

    public function update(Request $request, $id){
    	dd('update');
    }

    public function destroy(){
    	dd('delete');
    }


}