<?php
/**
 * 
 */
class CaseTypeModel extends Model
{
	public $_table = "case_type";
	public function queryData()
	{
		$res = $this->getDataAll();
		return $res;
	}
}