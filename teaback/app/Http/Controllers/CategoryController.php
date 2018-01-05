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
        $id=$request->input('category_id');
        $category=$cate->data($id);
        //var_dump($category);die;
        try{
            if(!isset($id)){
                 throw new \Exception("参数传递非法");
            }
        }catch(\Exception $e){
              die($e->getMessage());
        }
    	$cateone=$cate->find($id);
    	if($request->isMethod('POST')){
	    	$this->validate(request(),[
	            'category_name' => 'required|string|max:20|min:1',

	        ]);
	        
        	$cateupd = $cate->find($request->input('category_id'));
            $cateupd->category_name = $request->input('category_name');
            $cateupd->parent_id = $request->input('parent_id');
            $res=$cateupd->save();   //返回bool
            if($res){
                return redirect("category/index");
            }

        }
    	return view('category.categoryupd',compact('cateone','category'));
    }
    //删除数据
    public function delData(Request $request){
        $cate = new Category;
        $id=$request->input('category_id');
        $res=$cate->where(['parent_id'=>$id])->count();
        try{
            if($res>0){
                 throw new \Exception("该分类下还有分类不能删除");
            }
        }catch(\Exception $e){
              die($e->getMessage());
        }
        if($cate->find($id)->delete()){
            //删除成功
             return redirect("category/index");
        }else{
            //删除失败
             return redirect("category/index");
        }
       
    }
   
}
