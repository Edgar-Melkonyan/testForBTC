<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Module;
use App\Http\Requests\ModuleRequest;

class FrontController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module=null)
    {
    	$modules = Module::where('active',1)->pluck('name');
        if(!empty($module)){
            $module = Module::where('active',1)->where('name',$module)->firstOrFail()->name;
        }
        if(empty($modules[0])){
    		$products = [];
    	}
    	else{
		    $filter = !empty($module) ? $module : $modules[0];	
		    switch ($filter) {
			    case 'Last added':
			        $products = Product::orderBy('created_at','desc')->get();
			        break;
			    case 'Most viewed':
			        $products = Product::orderBy('view_count','desc')->get();
			        break;
			    case 'User picked':
			        $products = Product::where('picked',1)->get();
			        break;
			}
		}	
        return view('frontend.index')
            ->with('modules', $modules)
            ->with('products', $products);
    }
}
