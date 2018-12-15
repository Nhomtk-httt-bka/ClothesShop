<?php

namespace App\Http\Controllers;
use App\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        return view('admins/categories',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get object category follow Name and Url
        $category_name = $request->category_name;
        $category_url = $request->category_url;
        $categoryByName = Category::where('category_name',$category_name)->first();
        $categoryByUrl = Category::where('category_url',$category_url)->first();

        // Check whether category_name, category_url existed ?
        if(!is_null($categoryByName)) {
            return Redirect::back()->with('error', '* Category name arleady existed');
        } else if (!is_null($categoryByUrl)) {
            return Redirect::back()->with('error', '* Category url arleady existed');
        } else {
            Category::create([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'category_url' => $request->category_url,
        ]);
        return redirect('categories')->with('success', 'Category created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admins.category_update',['category' => $category]);
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

        $category = Category::find($id);
        $category_name_old = $category->category_name;
        $category_url_old = $category->category_url;
        
        // get object category follow Name and Url
        $category_name = $request->category_name;
        $category_url = $request->category_url;
        $categoryByName = Category::where('category_name',$category_name)->first();
        $categoryByUrl = Category::where('category_url',$category_url)->first();

        // Check whether category_name, category_url existed ?
        if($category_name_old != $category_name) {
            if(!is_null($categoryByName)) {
                return Redirect::back()->with('error', '* Category name arleady existed');
            }
        }
        if ($category_url_old != $category_url ){
            if(!is_null($categoryByUrl)) {
                return Redirect::back()->with('error', '* Category url arleady existed');
            }
        }
        
        // update Category
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->category_url = $request->category_url;

        $category->save();

        return redirect('categories')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $category = Category::find($id);
        if($request->status == 0){
            $category->status = 1;    
        }else{
            $category->status = 0; 
        }
        $category->save();
        return redirect('categories');
    }
}
