<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
class LoginController extends  Controller
{
    public function login(){
        return view('root/index');
    }
    public function mydesk(){
        return view('root/index-2');
    }
    public function welcome(){
        return view('root/welcome');
    }
}
?>