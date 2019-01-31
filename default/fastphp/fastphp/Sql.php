<?php

	Class Sql{
		public static $_config;
		public static $res;
		/**
		 * 构造方法连接数据库
		 * [__construct description]
		 */
		public function __construct()
		{

			$host = self::$_config['db']['host'];
			$user = self::$_config['db']['db_user'];
			$pwd = self::$_config['db']['db_pwd'];
			$dbName = self::$_config['db']['db_name'];
			// self::$res = @mysql_connect($host,$user,$pwd);
			// mysql_select_db($dbName);
			self::$res = new PDO("mysql:host={$host};dbname={$dbName}",$user,$pwd);
			// echo 1;die;
		}
		/**
		 * 处理sql语句
		 * @return [type] [description]
		 */
		public function handlesql($arr,$type)
		{
			// var_dump($arr);die;
			$sql = "";
			foreach ($arr as $key => $value) {
				// $sql .= "$key=$value $type";
				if(is_numeric($value)){
					$sql .= "$key=$value $type ";
				}else{
					$sql .= "$key='$value' $type ";
				}
			}
			$sql = rtrim($sql,"$type");
			// var_dump($sql);die;
			return $sql;
		}
		/**
		 * 查询数据库
		 * @return [type] [description]
		 */
		public function select($arrWhere=1)
		{
			if($arrWhere!=1){
				$tableName = $this->_table;
				$arrWhere = $this->handlesql($arrWhere,' and ');
			}else{
				$tableName = $this->_table;
			}
			// $arrWhere = $this->handlesql($arrWhere,'and');
			// var_dump($arrWhere);
			$sql = "SELECT * FROM {$tableName} WHERE {$arrWhere}";
			// var_dump($sql);
			$res = $this->query($sql);
			return $res;
		}
		public function selectOne($arrWhere=1,$arrName)
		{
			if($arrWhere != 1){
				$arrWhere = $this->handlesql($arrWhere,' and ');
			}else{
				echo 2;
			}
			$tableName = $this->_table;
			
			$sql = "SELECT {$arrName} FROM {$tableName} WHERE {$arrWhere}";
			$res = $this->find($sql);
			return $res;
		}
		/**
		 * 添加
		 * @return [type] [description]
		 */
		public function insert($sql)
		{
			$optype = ",";
			$handlesql = $this -> handlesql($sql,$optype);
			$tableName = $this->_table;
			$sql = "INSERT INTO {$tableName} SET {$handlesql}";
			$res = $this->exec($sql);
			return $res;
		}
		/**
		 * 删除
		 * @return [type] [description]
		 */
		public function delete($arrWhere)
		{
			$tableName = $this->_table;
			$arrWhere = $this->handlesql($arrWhere,'');
			$sql = "DELETE FROM {$tableName} WHERE {$arrWhere}";
			$res = $this->exec($sql);
			return $res;
		}
		/**
		 * 修改
		 * @return [type] [description]
		 */
		public function update($arrValue,$arrWhere)
		{
			$arrValue = $this -> handlesql($arrValue,',');
			$arrWhere = $this -> handlesql($arrWhere,' and ');
			$tableName = $this->_table;
			// var_dump($tableName);die;
			$sql = "UPDATE {$tableName} SET {$arrValue} WHERE {$arrWhere}";
			// var_dump($sql);die;
			$res = $this->exec($sql);
			return $res;
		}

		public function exec($sql)
		{
			$this->wrtieLog($sql);
			$res = self::$res->exec($sql);
			return $res;
		}
		public function query($sql)
		{
			$res = self::$res->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		public function find($sql)
		{	
			// var_dump($sql);die;
			$res = self::$res->query($sql)->fetch(PDO::FETCH_ASSOC);
			// var_dump($res);die;
			return $res;
		}
		public function wrtieLog($sql)
		{
			//创建目录Y/m/d
			
		}
	}

?>