<?php
/**
 * 
 */
class UseModel extends Model
{
	public $_table = "use";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}