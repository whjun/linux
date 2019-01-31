<?php
/**
 * 
 */
class ImageModel extends Model
{
	public $_table = "goods_img";
	public function queryOne($id)
	{
		$arrWhere = array("goods_id"=$id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
}