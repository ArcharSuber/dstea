<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;

class Goodsattr extends Model{
     //指定表名    
     protected $table = 'goods_attr';
     //指定主键   
     protected $primaryKey = 'goods_attr_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = false;

     
 }