<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','updateViewCount']]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')
            ->with('products', $products);
    }

    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $productRequest)
    {
        $image_name = $this->uploadImage($productRequest->image_name);
        $data = [
            'name'         => $productRequest->name,
            'image_name'   => $image_name
        ];    
        $product = Product::create($data);        
        return redirect('products')
            ->with('message', 'Product Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product')
            ->with('product',$product);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')
            ->with('product', $product);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProductRequest $productRequest , $id)
    {
        $product = Product::findOrFail($id);
        $data['name'] = $productRequest->name;
        if(!empty($productRequest->image_name)){
            $image_name = $this->uploadImage($productRequest->image_name);
            $this->deleteImage($product->image_name);
            $data['image_name'] = $image_name; 
        }
        $product->update($data);        
        return redirect('products')
            ->with('message', 'Product Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->deleteImage($product->image_name);
        $product->delete();
        return redirect('products')
            ->with('message', 'Product Deleted Successfully!');
    }


    public function updateViewCount($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['view_count' => $product->view_count+1]);   
    }

    private function uploadImage($image){
        $extension = $image->getClientOriginalExtension(); 
        $image_name = time() . '.' . $extension;
        $image->move(public_path() . '/images', $image_name);
        return $image_name;
    }

    private function deleteImage($image_name){
        $file_path = public_path() . '/images/' . $image_name;
        \File::delete($file_path);
    }
}
