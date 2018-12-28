<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showDashboard(){
        return view('admins/dashboard');
    }
    /**
     * [checkAuth description] Check account admin
     * @param  Request $request admin_email, admin_password
     * @return view dashboard if true
     */
    protected function checkAuth(Request $request){
        $credential=[
            'admin_email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::guard('admin')->attempt($credential)){
            if(Auth::guard('admin')->user()->admin_status == 0){
                Auth::guard('admin')->logout();
                $request->session()->flush();
                return redirect('admins')->withErrors(['This account was blocked, please contact admin to support'])->withInput();
            }
            return redirect('employees');
        }else{
            return redirect('admins')->withInput();
        }
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Admin::create([
            'admin_name' => $request->admin_name,
            'password' => Hash::make($request->password),
            'admin_phone' => $request->admin_phone,
            'admin_email' => $request->admin_email,
            'admin_status' => 2 // 1 is admin, 0 is employee
            
        ]);
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('admins/forgot-password');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
