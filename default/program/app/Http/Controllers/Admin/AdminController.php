<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use App\Http\Factory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
class AdminController extends BaseController
{
	public function admin_role()
	{
		return view("root/admin/admin_role");
	}
	public function admin_role_add()
	{
		return view("root/admin/admin_role_add");
	}
	public function admin_permission()
	{
		return view("root/admin/admin_permission");
	}
}