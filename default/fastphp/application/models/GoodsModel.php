<?php
/**
 * 
 */
class GoodsModel extends Model
{
	public $_table = "goods";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
	public function queryWhere($id)
	{
		$arrWhere = array("type_id"=>$id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
	public function WhereId($id)
	{
		$arrWhere = array("type_id"=>$id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
	public function querWhereOne($id)
	{
		$arrWhere = array("id"=>$id);
		$res = $this->getDataRecord($arrWhere);
		return $res;
	}
	public function queryOne($id)
	{
		$arrWhere = array("id"=>$id);
		$res = $this->getDataRecord($arrWhere);
		return $res;
	}
}