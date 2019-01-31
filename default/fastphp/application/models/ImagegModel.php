<?php
/**
 * 
 */
class ImageModel extends Model
{
	public $_table = "goods_img";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}