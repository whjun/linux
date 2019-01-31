<?php
/**
 * 
 */
class AboutTypeModel extends Model
{
	public $_table = "about";
	public function queryData()
	{
		$res = $this->getDataRecord();
		return $res;
	}
}