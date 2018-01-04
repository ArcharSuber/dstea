<?php
namespace App\Http\Common;
class File{
	private $_dir;
	const EXT = '.txt';
	public function __construct(){
		 $this->_dir = dirname(__FILE__).'/files/';
	}
	public function cacheData($key,$value='',$path=''){
         $filename=$this->_dir.$path.$key.self::EXT;
         //生成缓存   删除缓存
         if($value!==''){ //将value值缓存
         	   if(is_null($value)){
         	   	     //删除缓存   成功返回true 失败返回false
                     return @unlink($filename);
         	   }
               $dir = dirname($filename);
               if(!is_dir($dir)){
                     mkdir($dir,0777);
               }
               //失败返回false 成功返回字节数
              return file_put_contents($filename, json_encode($value));
         }
         //获取缓存
         if(!is_file($filename)){
                return FALSE;
         }else{
         	 return json_decode(file_get_contents($filename),true);
         }

	}
}
/*
$data =[
    'id'=>1,
    'name'=>'admin',
    'content'=>'添加的第一个缓存文件',
];
$file = new File;
//增加缓存
if($file->cacheData('cachefile',$data)){
	echo 1;exit;
}else{
	echo 0;exit;
}

//查询缓存
if($file->cacheData('cachefile')){
	var_dump($file->cacheData('cachefile'));exit;
}else{
	echo 0;
}
//删除缓存
// if($file->cacheData('cachefile',null)){
// 	echo 1;
// }else{
// 	echo 0;
// }
*/