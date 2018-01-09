<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Product;
use App\Http\model\Goods;
use DB;

class ProductController extends Controller
{
    

    //商品添加
    public function addData(Request $request){
        $goods=$request->all();
        $goods_id=$goods['goods_id'];
        $goodsattr=DB::table('goods_attr')->where(['goods_id'=>$goods_id])->get();
       //dd($goodsattr);die;
        $attr=[];
        foreach($goodsattr as $k=>$v){
            //echo $v->attr_id;die;
            $attr[$v->attr_id]=DB::table('attribute')->where(['attr_id'=>$v->attr_id])->get();
            
        }
        //dd($attr);die;
      /*
        if($request->isMethod('post')){
            $this->validate($request,[
                 'product_sn'=>'required|min:6|max:30',
                 'product_number'=>'required|integer',
            ],[
                 'required'=>':attribute 为必填项',
                 'min'=>':attribute 长度不符合要求',
                 'integerin'=>':attribute 必须为整数',
            ],[
                 'product_sn'=>'产品编号',  
                 'product_number'=>'产品数量(库存)',
            ]);
            
            $validator=\Validator::make($request->input(),[
                 'product_sn'=>'required|min:6|max:30',
                 'product_number'=>'required|integer',
            ],[
                 'required'=>':attribute 为必填项',
                 'min'=>':attribute 长度不符合要求',
                 'integerin'=>':attribute 必须为整数',
            ],[
                 'product_sn'=>'产品编号',  
                 'product_number'=>'产品数量(库存)',
            ]);
            if($validator->fails()){
                  return redirect()->back()->withErrors($validator)->withInput();
            }
            return redirect('product/add')->with('success','添加成功');
            return redirect('product/add')->with('error','添加失败');
        }
      */
        return view('product.productadd',compact(['goods','goodsattr','attr']));
    }

    //产品添加
    public function index(Request $request){
        $res=Product::add($request);
        if($res){
             //修改商品表的库存goods_number
             $result=Goods::updnumber($request->goods_id,$request->product_number);
             if($result){
                return redirect('goods/index');
             }
        }
        return redirect('goods/index');
    }
    //商品修改
    public function upd(){

    }

    //商品删除
    public function del(){
      
    }
}
