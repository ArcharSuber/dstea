<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Type;
use App\Http\model\Attr;
use App\Http\model\Goodsattr;
use DB;

class GoodsattrController extends Controller
{
    //商品属性添加列表
    public function addData(Request $request){
         $goods_id=$request->input('goods_id');
         $types = Type::all();
         return view("goodsattr.add",compact('goods_id','types'));
    }

    //类型所对应的属性
    public function index(Request $request){
    	  $type_id=$request->input('type_id');
    	  if(!isset($type_id)){
    	  	  $type_id=1;
    	  }
         $data=Attr::all()->where('type_id','=',$type_id)->toArray();
         $arr=[];
         //dd($data);die;
         foreach($data as $key=>$val){
              $arr = explode(',', $val['attr_values']);
              foreach($arr as $k=>$v){
                     $data[$key]['attr'][]=$arr[$k];
              }
         }
         
        // dd($data);
        return response()->json($data);
    }
    //添加数据
    public function inserts(Request $request){
    	 if($request->isMethod('post')){
               $input=$request->all();
               unset($input['_token']);
               //dd($input);die;
               $data=[];
               for($i=0;$i<2;$i++){
                   $data[$i]['goods_id']= $input['goods_id'];
                   $data[$i]['attr_id']=$input['attr_id'][$i];
                   $data[$i]['attr_value']=$input['attr_value'][$i];
                   $data[$i]['attr_price']=$input['attr_price'][$i]; 
               }
               //dd($data);die;
               $res=DB::table('goods_attr')->insert($data);
               return redirect('goods/index');
    	 }
    }

}