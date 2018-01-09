<?php
namespace App\Http\model;
                  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Type extends Model{
     //指定表名    
     protected $table = 'goods_type';
     //指定主键   
     protected $primaryKey = 'type_id';
     //指定不允许批量赋值的字段
     protected $guarded = [];

     //自动维护时间戳
     public $timestamps = false;

 }
