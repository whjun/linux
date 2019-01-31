<?php
/**
 * 
 */
class Index extends Controller
{
	public function test()
	{
		$objuser = new UserModel();
		$name = "lisi";
		$age = 20;
		$id = 6;
		$res = $objuser -> getUserinfo($name,$age);
		var_dump($res);die;
	}
	public function update()
	{
		$objuser = new UserModel();
		$name = "hahah";
		$age = 19;
		$id = 9;
		$res = $objuser -> updateUserInfo($name,$age,$id);
		var_dump($res);
	}
	public function delete()
	{
		$objuser = new UserModel();
		$id = 4;
		$res = $objuser -> deleteUserInfo($id);
		var_dump($res);
	}
	public function select()
	{
		$objuser = new UserModel();
		$name = "lisi";
		$id = 7;
		$res = $objuser -> queryOne($name,$id);
		var_dump($res);
	}
	// public function index()
	// {	
		
	// 	// echo 111111;
	// 	// $objcookie = new Cookie();
	// 	// $name = "name";
	// 	// $value = "lisi";
	// 	// $res = $objcookie->get($name);
	// 	// echo $res;
	// }
}
