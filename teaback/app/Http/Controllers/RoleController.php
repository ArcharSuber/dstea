<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
	//角色列表
	public function index(){
		return view('role.list');
	}
	//角色添加
	public function add(){
		return view('role.add');
	}
	//角色赋权
	public function upd(){
		return view('role.upd');
	}
}