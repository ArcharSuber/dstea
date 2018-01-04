<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{
	//管理员列表
	public function index(){
		//echo "管理员列表";
		return view('power.list');
	}
	//管理员添加
	public function add(){
		return view('power.add');
	}
}