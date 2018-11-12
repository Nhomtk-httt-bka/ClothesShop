<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;


class UserController extends Controller
{
    
    public function showLogin(){
        return view('users/login');
    }
    public function doLogout(){
        Auth::logout();
        return redirect('home');
    }
    protected function checkAuth(Request $request){
        $credential=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($credential)){
            return redirect('home');
        }else{
            return redirect('login')->withInput();
        }
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        $validated = $request->validated();
        if($request->file('logo')) {
            $imageName = request()->logo->getClientOriginalName() .'-'. time().'.'. request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('img/users'), $imageName);
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_phone' => $request->user_phone,
                'user_address' => $request->user_address,
                'password' => Hash::make($request['password']),
                'user_image' => $imageName,
            ]);
            return redirect('home')->with('success', 'User created successfully.');
        }
        return Redirect::back()->withErrors(['The image null or wrong type'])->withInput();
        
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
        //
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
