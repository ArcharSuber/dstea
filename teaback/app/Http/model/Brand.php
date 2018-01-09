<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model{
     //指定表名    
     protected $table = 'brand';
     //指定主键   
     protected $primaryKey = 'brand_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = false;
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
            $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
            if($bool){
            	return 'app/uploads/'.$filename;
            }else{
            	return false;
            }
        }

     }

     public static function add($request,$brand_logo){
     	     $data=[];
     	     $data['brand_logo']=$brand_logo;
             $data['brand_name']=$request->input('brand_name');
        	 $data['brand_url']=$request->input('brand_url');
        	 $data['is_show']=$request->input('is_show');
        	 $data['sort']=$request->input('sort');
        	 $data['brand_desc']=$request->input('brand_desc');
        	 $res=Brand::create($data);
        	 return $res;

     }

     //查询所有品牌信息
     public static function alldata(){
            $data=self::get();
            return $data;
     }
     

 }