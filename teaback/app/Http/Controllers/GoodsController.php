<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Goods;
use App\Http\model\Brand;
use App\Http\model\Category;

class GoodsController extends Controller
{
    //商品列表
    public function index(){
        $goods = Goods::orderBy('created_at','desc')->paginate(5);
        return view('goods.goodslist',compact('goods'));
    }

    //商品添加
    public function addData(Request $request){
        $cate = new Category;
        $category=$cate->data();
        $brands=Brand::alldata();
        if($request->isMethod('post')){
            $file = $request->file('goods_img');
            $goods_img=Goods::uploads($file);
            //dd($goods_img);die;
            if($goods_img){
                $res=Goods::addAll($request,$goods_img);
                if($res){
                     return redirect('goods/index');
                }else{
                     return redirect()->back();
                }
            }  
        }
        return view('goods.goodsadd',compact('category','brands'));
    }

    //商品修改
    public function upd(){

    }

    //商品下架
    public function del(){
      
    }

}
