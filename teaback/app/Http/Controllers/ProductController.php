<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //商品列表
    public function index(){
        return view('productlist');
    }

    //商品添加
    public function increase(){
        return view('productincrease');
    }

    //商品修改
    public function alter(){

    }

    //商品删除
    public function delete(){
      
    }
}
