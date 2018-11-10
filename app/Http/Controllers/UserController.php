<?php

namespace App\Http\Controllers;
use App\models\Products;
use App\models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;


class UserController extends Controller
{
    public function showHome(){
        $products = Products::all('product_name','product_price','product_rate','product_image');
        $categories = Category::all('category_name');
        return view('users/home',['products'=> $products, 'categories' => $categories]);
    }

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
        // echo $request;

        $validated = $request->validated();

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('home');
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
