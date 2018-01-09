<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use DB;

class Attr extends Model{
     //指定表名    
     protected $table = 'attribute';
     //指定主键   
     protected $primaryKey = 'attr_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = false;
     //联查类型表
     public static function jointypes(){

     	 return DB::table('attribute')
            ->join('goods_type', 'attribute.type_id', '=', 'goods_type.type_id')
            ->select('attribute.*', 'goods_type.type_id', 'goods_type.type_name')
            ->get();
     }
}