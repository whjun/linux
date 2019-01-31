<?php
namespace App\Http\Controllers\Login;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Input;
use App\Http\Factory;

class LoginController extends BaseController {
    public function login(){
        return view("root/login/login");
    }
    public function login_do(){
        $data = Input::post();
        $model = new UserModel();
        $res = $model->getUser($data)->toArray();
        if($res){
            return redirect("index");
        }else{
            return redirect("login");
        }
        // if($post = Input::post()){
        //     $res = $this->ioc->BrandService('useList', [Factory::UserModel(), $post]);
        //     var_dump($res);die;
        //     return redirect("index");
        // }
    }
    public function register()
    {
        return view("root/register");
    }
    public function register_do()
    {
        if($post = Input::post()) {
            $res = $this->ioc->BrandService('userData', [Factory::UserModel(), $post]);
            // var_dump($res);die;
            if($res){
                echo "<script>alert('注册成功');location.href='../index.php/login';</script>";
            }else{
                echo "<script>alert('注册失败');location.href='../index.php/login';</script>";
            }
        }
    }
}
