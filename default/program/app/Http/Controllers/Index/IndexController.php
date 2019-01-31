<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use App\Http\Factory;
use App\Http\Model\TypeModel;
use App\Http\Model\BrandModel;
use Illuminate\Http\Request;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author DELL
 */
class IndexController extends BaseController
{
    public function index(){
        return view("root/index/index");
    }
    public function welcome(){
    	return view("root/welcome");
    }
    public function article_list(){
    	return view("root/article_list");
    }
    public function article_add(){
    	return view("root/article_add");
    }
}
