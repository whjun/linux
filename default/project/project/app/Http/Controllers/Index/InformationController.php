<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;

class InformationController extends Controller{
    public function information(){
        return view("root/article-list");
    }
}