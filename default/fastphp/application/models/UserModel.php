<?php
	class UserModel extends Model
	{

		public $_table = 'test';
		public function getUserInfo($name,$age)
		{
			$arr = array('name' => $name, 'age' => $age);
			// $arrWhere = array('id'=>$arrWhere);
			$res = $this->insertRecord($arr);
			return $res;
		}
		public function updateUserInfo($name,$age,$id)
		{
			$arrValue = array('name'=>$name,'age'=>$age);
			$arrWhere = array('id'=>$id);
			$res = $this->updateRecord($arrValue,$arrWhere);
			return $res;
		}
		public function deleteUserInfo($id)
		{
			$id = array('id'=>$id);
			$res = $this->deleteRecord($id);
			return $res;
		}
		public function queryAllUserInfo($name)
		{
			$arrWhere = array('name'=>$name);
			$res = $this->getDataAll($name);
			return $res;
		}
		public function queryOne($name,$id)
		{
			$arrWhere = array("name"=>$name,"id"=>$id);
			// var_dump($name);
			$res = $this->getDataRecord($arrWhere);
			// var_dump($res);die;
			return $res;
		}
	} 
?>