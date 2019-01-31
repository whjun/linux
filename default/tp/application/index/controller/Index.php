<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\paginate;
use think\Session;
class Index extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    
    public function login_do()
    {
        $data = Request::instance()->post();
        // var_dump($data);die;
        // $pwd = Request::instance()->post('pwd');
        // var_dump($pwd);die;
        $sql = Db::table('user')->where('name',$data['name'])->find();
        if($sql){
            $res = Db::table('user')->where('pwd',md5($data['pwd']))->find();
            if($res){
                Session::set('loginInfo',json_encode($res));
                $this->success("登录成功","http://www.wanghongjun.top/tp/public/index.php?s=index/index/index");
            }else{
                $this->error("密码有误");
            }
        }else{
            $this->error('用户名有误');
        }
    }
    public function register()
    {
        return $this->fetch();
    }
    public function register_do()
    {
        // $data = Request::instance()->post();
        $data = Request::instance()->post();

        $data_name = Db::table('user')->where('name',$data['name'])->find();
        if(!empty($data_name)){
            $this->error("该用户名已存在");
        }

        $data = [
            'name'=>$data['name'],
            'pwd'=>md5($data['pwd']),
        ];
        $res = Db::name('user')->insert($data);
        // var_dump($res);die;
        if($res){
            $this->success('注册成功','http://www.wanghongjun.top/tp/public/index.php?s=index/index/login');
        }else{
            $this->error('注册失败');
        }


    }
    public function index()
    {
        $loginInfo = Session::get('loginInfo');
        $loginInfo = json_decode($loginInfo,true);
        $res = Db::table('user')->where('name',$loginInfo['name'])->find();
        // var_dump($res);die;
        $data = Db::name("content")->paginate(10);
        $this->assign('data',$data);
        $this->assign('res',$res);
        return $this->fetch();
    }
    public function add_do()
    {
        $loginInfo = Session::get('loginInfo');
        $loginInfo = json_decode($loginInfo,true);
        // var_dump($loginInfo);die;
    	$is_no = Request::instance()->post('is_no');
    	$content = Request::instance()->post('content');
        // echo $p_id;die;
        // var_dump($p_id);die;
    	$time = date("Y-m-d H:i:s");
    	if($is_no==0){
            // $p_id = Db::table('user')->where('id')->find();
            // echo $p_id;die;
    		$data = [
    			'user_name' => $loginInfo['name'],
    			'content' => $content,
    			'time' => $time,
    			'p_id' => $loginInfo['id'],
    			'is_no' => 0,
    		];
    		// var_dump($data);die;
    		$res = Db::table('content')->insert($data);
    		if($res){
    			$data = Db::name("content")->paginate(10);
                $data = json_encode($data);
                // $data = json_decode($data,true);
                echo $data;die;
    		}else{
    			echo 0;die;
    		}
    	}else if($is_no==1){
            echo 2;die;
    		$name = "匿名";
    		$data = [
    			'user_name' => $name,
    			'content' => $content,
    			'time' => $time,
    			'p_id' => 0,
    			'is_no' => $is_no,
    		];

    		$res = Db::table('content')->insert($data);
    		if($res){
    			$data = Db::name("content")->paginate(10);
                $data = json_encode($data);
                // $data = json_decode($data,true);
                echo $data;die;
    		}else{
    			echo 0;die;
    		}
    	}
    }
    public function del()
    {
        $id = Request::instance()->post('id');
        $res = Db::table('content')->delete($id);
        if($res){
            $data = Db::name("content")->paginate(10);
            // var_dump($data);die;
            $data = json_encode($data);
            // $data = json_decode($data,true);
            echo $data;die;
        }else{
            echo 1;die;
        }
    }
}
