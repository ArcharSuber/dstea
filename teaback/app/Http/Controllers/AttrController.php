<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Attr;
use App\Http\model\Type;
use DB;

class AttrController extends Controller
{
    //类型列表
    public function index(){
    	 $attrs=Attr::jointypes();
         return view('attr.attrlist',compact('attrs'));
    }
    //类型添加
    public function addData(Request $request){
    	 $types = Type::get();
    	 if($request->isMethod('post')){
    	 	   $this->validate(request(),[
                   'attr_name' => 'required|string|max:20|min:1',
                   'attr_values' =>'required|string|max:100'
               ]); 
               $all=$request->all();
               unset($all['_token']);
               if(Attr::create($all)){
                    return redirect('attrtype/attrindex');
               }else{
               	    return redirect('attrtype/attradd');
               }

    	 }
         return view('attr.attradd',compact('types'));
    }

    //类型删除
    public function del(Request $request){
           $attr_id=$request->input('attr_id');
           try{
	            if(!isset($attr_id)){
	                 throw new \Exception("参数传递非法");
	            }
	        }catch(\Exception $e){
	              die($e->getMessage());
	        } 
	        Attr::find($attr_id)->delete();
	        return redirect('attrtype/attrindex');
    }
    //类型修改
    public function upd(Request $request){
            $attr_id=$request->input('attr_id');
            try{
	            if(!isset($attr_id)){
	                 throw new \Exception("参数传递非法");
	            }
	        }catch(\Exception $e){
	              die($e->getMessage());
	        } 
	        $types = Type::get();
            $attr = Attr::find($attr_id);
            if($request->isMethod('post')){
                  $att=$request->all();
                  unset($att['_token']);
                  $attr->attr_name=$att['attr_name'];
                  $attr->attr_values=$att['attr_values'];
                  $attr->type_id=$att['type_id'];
                  $attr->attr_type=$att['attr_type'];
                  $res=$attr->save($att);
                  if($res){
                      return redirect('attrtype/attrindex');
                  }else{
                  	  return redirect()->back();
                  }

            }
	        return view('attr.attrupd',compact('types','attr'));
    }     
     

}