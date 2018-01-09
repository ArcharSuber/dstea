<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use DB;

class Goods extends Model{
     //指定表名    
     protected $table = 'goods';
     //指定主键   
     protected $primaryKey = 'goods_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = true;
    //指定时间类型是时间戳
    protected function getDateFormat(){
               return time();
    }

     //修改库存
     public static function updnumber($goods_id,$goods_number=0){
     	   $goods_number=intval($goods_number);
     	   $goods_id=intval($goods_id);
           $res=DB::table('goods')->where('goods_id','=',$goods_id)->increment('goods_number',$goods_number);
           return $res;
     }

     //添加商品
     public static function addAll($request,$goods_img){
            $data=$request->all();
            unset($data['_token']);
            $data['goods_img']=$goods_img;
            return self::create($data);
     } 

     //上传文件
     public static function uploads($file){
        if($file->isValid()){
                      //原文件名
            $originalName = $file->getClientOriginalName();
            //扩展名
            $ext = $file->getClientOriginalExtension();
            //MimeType
            $type=$file->getClientMimeType();
            //临时绝对路径
            $realPath=$file->getRealpath();

            $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
            //var_dump($filename);die;
            $bool = Storage::disk('goods')->put($filename,file_get_contents($realPath));
            if($bool){
                return 'app/uploads/goods/'.$filename;
            }else{
                return false;
            }
        }

     }

 }