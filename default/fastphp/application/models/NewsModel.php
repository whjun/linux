<?php
/**
 * 
 */
class NewsModel extends Model
{
	public $_table = "news";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
	public function queryDataWhere($id)
	{
		$arrWhere = array("n_type_id"=>$id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
	public function queryWhere($id)
	{
		$arrWhere = array("n_type_id"=>$id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
	public function queryOne($id)
	{
		$arrWhere = array("id"=>$id);
		$res = $this->getDataRecord($arrWhere);
		return $res;
	}
}