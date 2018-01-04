<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
	//订单列表
	public function index(){
		
		return view('order.list');
	}
	
}