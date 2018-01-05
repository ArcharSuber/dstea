<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
     //指定表名    
     protected $table = 'category';
     //指定主键   
     protected $primaryKey = 'category_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = false;

     //查询所有parent_id=0
     public function data($noCat=0){
         $data = $this->get();
         $catLevel = $this->getCateLevel($data,$noCat);
         return $catLevel;
     }
     //递归组装数据
     public function getCateLevel($data,$noCat=0,$pid=0,$level=1){
            static $catList = [];
            foreach($data as $key=>$val){
                  if($val['parent_id'] == $pid && $val['category_id'] !=$noCat){
                  	    $val['level'] = $level;
                        $catList[] = $val;
                        $this->getCateLevel($data,$noCat,$val['category_id'],$level+1);
                  }
            }
            return $catList;
     }
     
    
}