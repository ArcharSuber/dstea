<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Type;

class TypeController extends Controller
{
    //类型列表
    public function index(){
         $types=Type::orderBy('type_id','asc')->paginate(5);
         return view('type.typelist',compact('types'));
    }
    //类型添加
    public function addData(Request $request){

    	if($request->isMethod('post')){
              
              $this->validate(request(),[
                   'type_name' => 'required|string|max:20|min:1',
             ]);
              $res=Type::create(['type_name'=>$request->input('type_name')]);
              if($res){
                   return redirect('attrtype/typeindex');
              }else{
              	   return redirect()->back();
              }
    	}

        return view('type.typeadd');
    }
    //类型删除
    public function del(Request $request){
          $type_id=$request->input('type_id');
          try{
	            if(!isset($type_id)){
	                 throw new \Exception("参数传递非法");
	            }
          }catch(\Exception $e){
              die($e->getMessage());
          }
          Type::find($type_id)->delete();
          return redirect('attrtype/typeindex');
    }
    //类型修改
    public function upd(Request $request){
         $type_id=$request->input('type_id');
          try{
	            if(!isset($type_id)){
	                 throw new \Exception("参数传递非法");
	            }
          }catch(\Exception $e){
              die($e->getMessage());
          }
          $type=Type::find($type_id);
          if($request->isMethod('post')){
          	      $this->validate(request(),[
                      'type_name' => 'required|string|max:20|min:1',
                  ]);
                  $type->type_name=$request->type_name;
        	      $res=$type->save();
                  if($res){
                      return redirect('attrtype/typeindex');
                  }else{
                  	  return redirect()->back();
                  }
          }
          return view('type.typeupd',compact('type'));
    }

}