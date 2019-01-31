<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{
	public function index()
	{
		return view();
	}

	public function add_do()
	{
		$data = input('post.');
		$res = Db::name('bai')->insert($data,true);
		if($res){
			$this->success("添加成功","http://www.wanghongjun.top/tp5/public/?s=index/Index/show");
		}else{
			$this->error("失败");
		}
	}
	public function show()
	{
		$data = Db::table('bai')->select();
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function del()
	{
		$id = $_GET['id'];
		$res = Db::table('bai')->delete($id);
		if($res){
			$this->success('删除成功',"http://www.wanghongjun.top/tp5/public/?s=index/Index/show");
		}
	}
	public function update()
	{
		$id = $_GET['id'];
		$data = Db::table('bai')->where('id',$id)->find();
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function update_do()
	{
		$data = input('post.');
		$id = $data['id'];
		$res = Db::name('bai')->where('id',$id)->update($data);
		if($res){
			$this->success('保存成功',"http://www.wanghongjun.top/tp5/public/?s=index/Index/show");
		}
	}
}
?>