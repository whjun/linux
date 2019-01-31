<?php
/**
 * 
 */
class CaseModel extends Model
{
	public $_table="case";
	public function queryData($id)
	{
		$arrWhere = array($id);
		$res = $this->getDataAll($arrWhere);
		return $res;
	}
}

?>