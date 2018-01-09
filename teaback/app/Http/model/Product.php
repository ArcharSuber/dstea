<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use DB;

class Product extends Model{
     //指定表名    
     protected $table = 'products';
     //指定主键   
     protected $primaryKey = 'product_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = false;
     //执行添加
     public static function add($request){
        $arr=$request->all();
        unset($arr['_token']);
        $goods_id=$arr['goods_id'];
        $product_sn=$arr['product_sn'];
        $product_number=$arr['product_number'];
        $goods_attr=implode(',',$arr['goods_attr']);
        //echo $goods_attr;die;
        $res=DB::table('products')->insert(['goods_id'=>$goods_id,'goods_attr'=>$goods_attr,'product_sn'=>$product_sn,'product_number'=>$product_number]);
        return $res;
     }
 }