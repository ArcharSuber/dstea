<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Category;

class CategoryController extends Controller
{
    //分类列表
    public function index(){
    	$cate = new Category;
        $category=$cate->data();
        return view('category.categorylist',compact('category'));
    }
    //添加分类
    public function addData(Request $request){
    	$cate = new Category;
        $category=$cate->data();
        if($request->isMethod('POST')){
        	$parent_id=$request->input('parent_id');
        	$category_name=$request->input('category_name');
        	$this->validate(request(),[
              'category_name' => 'required|string|max:20|min:1',
            ]); 
        	$res = $cate->create(['category_name'=>$category_name,'parent_id'=>$parent_id]);
            if($res){
            	return redirect("category/index");
            }
        }
    	return view('category.categoryadd',compact('category'));
    }
    //修改数据
    public function updData(Request $request){
    	$cate = new Category;
        $category=$cate->data();
    	$id=$request->input('category_id');
    	$cateone=$cate->find($id);
    	if($request->isMethod('POST')){
	    	$this->validate(request(),[
	            'category_name' => 'required|string|max:20|min:1',

	        ]);
	        // $category_id=$request->input('category_id');
	        // $parent_id=$request->input('parent_id');
        	// $category_name=$request->input('category_name');
        	$cateupd = $cate->find($request->input('category_id'));
            $cateupd->category_name = $request->input('category_name');
            $cateupd->parent_id = $request->input('parent_id');
            $res=$cateupd->save();   //返回bool
            var_dump($res);die;

        }
    	return view('category.categoryupd',compact('cateone','category'));
    }
   
}
