<?php
namespace App\Http\Controllers\Vip;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use App\Http\Factory;
class VipController extends BaseController
{
	public function member_list(){
    	return view("root/member_list");
    }
    public function member_add(){
    	return view("root/member_add");
    }
}
?>