<?php
/**
 * 
 */
class Model extends Sql
{
	/**
	 * 添加记录方法
	 * @return [type] [description]
	 */
	public static $res;
	public function insertRecord($arr)
	{
		$res = $this->insert($arr);
		return $res;
	}
	/**
	 * 修改记录方法
	 * @return [type] [description]
	 */
	public function updateRecord($arrValue,$arrWhere)
	{
		$res = $this->update($arrValue,$arrWhere);
		return $res;
	}
	/**
	 * 删除记录方法
	 * @return [type] [description]
	 */
	public function deleteRecord($id)
	{
		$res = $this->delete($id);
		return $res;
	}
	/**
	 * 查询所有
	 * @return [type] [description]
	 */
	public function getDataAll($arrWhere=1)
	{
		if($arrWhere==1){
			$res = $this->select();
		}else{
			$res = $this->select($arrWhere);
		}
		return $res;
	}
	/**
	 * 查询一条
	 * @return [type] [description]
	 */
	public function getDataRecord($arrWhere=1,$arrName="*")
	{
		// var_dump($arrWhere);die;
		$res = $this->selectOne($arrWhere,$arrName);
		return $res;
	}

}


?>
