<?php
/**
 * 
 */
class GoodsTypeModel extends Model
{
	public $_table = "goods_type";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}