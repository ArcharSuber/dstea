<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    //分类列表
    public function index(){
    	$brands=Brand::orderBy('sort','desc')->paginate(5);
        return view('brand.brandlist',compact('brands'));
    }
    //品牌添加
    public function addData(Request $request){
    	if($request->isMethod('post')){
             $this->validate(request(),[
                   'brand_name' => 'required|string|max:20|min:1',
                   'brand_url' =>'required'
             ]); 
    		  $file = $request->file('brand_logo');
              $brand_logo=Brand::uploads($file);
              if($brand_logo){
                  $res=Brand::add($request,$brand_logo); 
                  if($res){
                      return redirect('brand/index'); 
                  }else{
                  	  return redirect()->back();
                  }
              }else{
              	 return redirect()->back();
              }
              
    	}
        return view('brand.brandadd');
    }
    //品牌修改
    public function updData(Request $request){
        $brand_id=$request->input('brand_id');
        try{
            if(!isset($brand_id)){
                 throw new \Exception("参数传递非法");
            }
        }catch(\Exception $e){
              die($e->getMessage());
        }
    	$brand=Brand::find($brand_id);
    	if($request->isMethod('post')){
             $this->validate(request(),[
                   'brand_name' => 'required|string|max:20|min:1',
                   'brand_url' =>'required'
             ]); 
    		  $file = $request->file('brand_logo');
              $brand_logo=Brand::uploads($file);
              if($brand_logo){
                  $brand->brand_name=$request->input('brand_name');
                  $brand->brand_url=$request->input('brand_url');
        	      $brand->is_show=$request->input('is_show');
        	      $brand->sort=$request->input('sort');
        	      $brand->brand_desc=$request->input('brand_desc');
        	      $brand->brand_logo=$brand_logo;
        	      $res=$brand->save();
                  if($res){
                      return redirect('brand/index'); 
                  }else{
                  	  return redirect()->back();
                  }
              }else{
              	 return redirect()->back();
              }
              
    	}

    	return view('brand/brandupd',compact('brand'));
    }
    //品牌删除
    public function delData(Request $request){
        $brand_id=$request->input('brand_id');
        try{
            if(!isset($brand_id)){
                 throw new \Exception("参数传递非法");
            }
        }catch(\Exception $e){
              die($e->getMessage());
        } 
        Brand::find($brand_id)->delete();
        return redirect('brand/index'); 
    }

}