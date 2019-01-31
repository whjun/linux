<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use \think\Session;
/**
 *
 */
class Admin extends Controller
{
	public function login()
	{
		return $this->fetch();
	}

	public function login_do()
	{
		$data = Request::instance()->post();
		$name = $data['login_name'];
		$pwd = $data['login_pwd'];
		$sql = Db::table("blogs_backstage_login")->where('login_name',$name)->find();
		if($sql){
			$res = Db::table("blogs_backstage_login")->where('login_pwd',$pwd)->find();
			if($res){
				Session::set('name',$name);
				Session::set('pwd',$pwd);

				$this -> success("登录成功","http://www.wanghongjun.top/bo/public/?s=index/admin/admin.html");
			}else{
				$this->error("密码输入有误！！！");
			}
		}else{
			$this -> error("用户名输入有误！！！");
		}
	}
	public function registerde()
	{
		return $this -> fetch();
	}
	public function registerde_do()
	{
		$data = Request::instance()->post();
		$res = Db::table("blogs_backstage_login")->insert($data);
		if($res){
			return $this->success('注册成功','http://www.wanghongjun.top/bo/public/?s=index/admin/login.html');
		}
	}
	public function admin()
	{
		$name = Session::get('name');
		// $pwd = Session::get('pwd');
		// if(!empty($name)){

		// }
		if(empty($name)&&empty($pwd)){
			$this->success('未登录,请先登录！！！',"http://www.wanghongjun.top/bo/public/?s=index/admin/login.html");
		}
		$res = Db::table("blogs_backstage_login")->where('login_name',$name)->find();
		$data = Db::table('blogs_backstage_content')->where('state',1)->select();
		// var_dump($data);die;
		return $this->fetch("index",['data'=>$data,'res'=>$res]);
	}

	public function photos()
	{
		return $this->fetch();
	}

	public function short_codes()
	{
		return $this->fetch();
	}

	public function single()
	{
		return $this->fetch();
	}
}
