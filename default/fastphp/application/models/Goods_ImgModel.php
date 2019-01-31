<?php
/**
 * 
 */
class GoodsImgModel extends Model
{
	public $_table = "goods_img";
	public function queryData($id)
	{
		$arrWhere = array("goods_id"=$id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
}