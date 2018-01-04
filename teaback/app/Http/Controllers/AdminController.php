<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	//管理员列表
	public function list(){
		//echo "管理员列表";
		return view('admin.list');
	}
	//管理员添加
	public function add(){
		return view('admin.add');
	}
}