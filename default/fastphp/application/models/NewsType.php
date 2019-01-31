<?php
/**
 * 
 */
class NewsModel extends Model
{
	public $_table = "news_type";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}