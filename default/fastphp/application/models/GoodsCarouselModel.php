<?php
/**
 * 
 */
class GoodsCarouselModel extends Model
{
	public $_table = "img";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}