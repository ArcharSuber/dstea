<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\model\Goods;
use App\Http\model\Brand;
use App\Http\model\Category;
use DB;

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

    //商品图片管理
    public function uploads(Request $request){
          $goods_id=$request->input('goods_id');

          if($request->isMethod('post')){
                $file = $request->file('picture_url');

                $picture_url=[];
                foreach($file as $k=>$v){
                    $picture_url[]=Goods::uploads($v);
                }
                $arr=[]; 
                for($i=0; $i < count($picture_url); $i++){
                      $arr[$i]['goods_id']=$goods_id;
                      $arr[$i]['picture_url']=$picture_url[$i];
                }
                if(DB::table('picture')->insert($arr)){
                    return redirect('goods/index');
                }else{
                    return redirect()->back();
                }
          }
          return view('goods.picture',compact('goods_id'));
    }

}
