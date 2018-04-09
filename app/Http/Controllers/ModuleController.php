<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Module;
use App\Http\Requests\ModuleRequest;

class ModuleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        $products = Product::select('id','name','picked')->get();
        return view('modules.index')
            ->with('modules', $modules)
            ->with('products', $products);
    }

    public function update(moduleRequest $moduleRequest)
    {
        Module::whereNotIn('name', $moduleRequest->modules)
            ->update(['active' => 0]);
        Module::whereIn('name', $moduleRequest->modules)
            ->update(['active' => 1]);     
        if(in_array('User picked',$moduleRequest->modules)){
            Product::whereNotIn('id', $moduleRequest->products)
                ->update(['picked' => 0]);
            Product::whereIn('id', $moduleRequest->products)
                ->update(['picked' => 1]);   
        }
        else{
            Product::where('picked', 1)
                ->update(['picked' => 0]);
        }
        return redirect('module')
            ->with('message', 'Module Updated Successfully');
    }
}
