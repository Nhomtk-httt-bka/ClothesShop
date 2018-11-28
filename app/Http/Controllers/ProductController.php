<?php

namespace App\Http\Controllers;
use App\models\Products;
use App\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $categories = Category::all('id','category_name');
        return view('admins.products',['products'=> $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->file('logo')) {
            $imageName = request()->logo->getClientOriginalName() .'-'. time().'.'. request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('img/products'), $imageName);
            Products::create([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_url' => $request->product_url,
                'category_id' => $request->category_id,
                'product_quantity' => $request->product_quantity,
                'product_price' => $request->product_price,
                'product_condition' => $request->product_condition,
                'product_keyword' => $request->product_keyword,
                'product_content' => $request->product_content,
                'product_image' => $imageName,
                
            ]);
            return redirect('products')->with('success', 'Product created successfully.');
        }
        return Redirect::back()->withErrors(['image', 'The image null or wrong type']);
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
        $product = Products::find($id);
        $categoryId = $product->category_id;
        $categories = Category::all('id','category_name');

        return view('admins.product_update',['product' => $product, 'categoryId' => $categoryId, 'categories' => $categories]);
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
        $product = Products::find($id);
        if ($request->file('logo')) {
            request()->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            $imageName = request()->logo->getClientOriginalName() .'-'. time().'.'. request()->logo->getClientOriginalExtension();
            request()->logo->move(public_path('img/products'), $imageName);

            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_url = $request->product_url;
            $product->category_id = $request->category_id;
            $product->product_quantity = $request->product_quantity;
            $product->product_price = $request->product_price;
            $product->product_condition = $request->product_condition;
            $product->product_keyword = $request->product_keyword;
            $product->product_content = $request->product_content;
            $product->product_image = $imageName;

            $product->save();
        } else {
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_url = $request->product_url;
            $product->category_id = $request->category_id;
            $product->product_quantity = $request->product_quantity;
            $product->product_price = $request->product_price;
            $product->product_condition = $request->product_condition;
            $product->product_keyword = $request->product_keyword;
            $product->product_content = $request->product_content;

            $product->save();
        }
            return redirect('products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('products');
    }
}
