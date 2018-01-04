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
     public function data(){
         $data = $this->get();
         $catLevel = $this->getCateLevel($data);
         return $catLevel;
     }
     //递归组装数据
     public function getCateLevel($data,$pid=0,$level=1){
            static $catList = [];
            foreach($data as $key=>$val){
                  if($val['parent_id'] == $pid){
                  	    $val['level'] = $level;
                        $catList[] = $val;
                        $this->getCateLevel($data,$val['category_id'],$level+1);
                  }
            }
            return $catList;
     }

    
}