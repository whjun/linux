<?php
/**
 * 
 */
class GoodsUseModel extends Model
{
	public $_table = "goods_use";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}