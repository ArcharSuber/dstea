<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
         //获取当前登录的用户id
           
            $id=1;
            //判断是否有登录
            
            // echo Cookie::get('uid');
            // var_dump($uid);
            //根据用户id查询角色
           $role_id = DB::table('admin_role')->where(['admin_id'=>$id])->pluck('role_id');
          // print_r($role_id);die;
           //根据角色id获取权限id
           $power_id = DB::table('role_power')->where(['role_id'=>$id])->pluck('power_id');
          // print_r($power_id);die;
           //根据权限id将权限名与url查询出来

           $arr=[];
           foreach($power_id as $v){
               //var_dump($v);die;
               $pid=DB::table('power')->where(['pid'=>0,'power_id'=>$v])->get();
               foreach($pid as $val){
                   $arr[$val->powername]=DB::table('power')->where(['pid'=>$val->power_id])->get();  
               }
               
           }
           view()->share('arr',$arr);
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
