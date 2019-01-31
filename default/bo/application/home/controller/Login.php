<?php
namespace app\home\controller;

use think\Controller;
use \think\Request;
use \think\Db;
class login extends Controller
{
	public function login()
	{
		// echo 1;die;
		return $this->fetch();
	}
	public function login_do(){
		$data = Request::instance()->post();
		$name = $data['username'];
		$pwd = $data['pwd'];
		$res = Db::table('blogs_backstage_user')->where('user_name',$name)->find();
		// print_r($res);die;
		if($res){
			$res_pwd = Db::table('blogs_backstage_user')->where('user_pwd',$pwd)->find();
			if($res_pwd){
				$this->success('登录成功','http://www.wanghongjun.top/bo/public/?s=home/index/add_article.html');
			}else{
				$this->error("密码输入有误！！");
			}
		}else{
			$this->error("用户名输入有误！！");
		}
	}
}

?>
