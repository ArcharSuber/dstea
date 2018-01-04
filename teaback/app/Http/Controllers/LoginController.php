<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{

	    
      public function index(Request $request){

           $username=$request->input('username');
           $password=$request->input('password');
           $res=DB::table('admin')->where(['username'=>$username,'password'=>$password])->get();
           if(count($res)){
           	    //$request->session()->put('uid',$res[0]->id);
               // session(['uid'=>$res[0]->id]);
           	    // if($request->session()->has('uid')){
                    // $uid = $request->session()->get('uid');
                    //  dd($uid);
                // }
                     // Cookie::make('uid',$res[0]->id);
                     // echo Cookie::get('uid');die;
           	    return redirect('/index');
           }else{
           	    return redirect('/');
           }

      }
      


}