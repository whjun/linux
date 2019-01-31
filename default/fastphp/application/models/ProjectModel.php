<?php
/**
 * 
 */
class ProjectModel extends Model
{

	public $_table = "user";
	public function selectData($name,$pwd)
	{
		// echo 1;die;
		$arrWhere = array("name"=>$name,"pwd"=>$pwd);
		$res = $this->getDataRecord($arrWhere);
		return $res;
	}
	// public $_table = "goods";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}

?>