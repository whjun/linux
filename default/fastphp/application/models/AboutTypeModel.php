<?php
/**
 * 
 */
class AboutTypeModel extends Model
{
	public $_table = "about";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
	public function queryOne($id)
	{
		$arrWhere = array("id"=>$id);
		$res = $this->getDataRecord($arrWhere);
		return $res;
	}
}