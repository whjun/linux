<?php
	class Cookie{
		public function add($key,$value)
		{
			$res = setcookie($key,$value);
			return $res;
		}
		public function up($key,$value)
		{
			$res = setcookie($key,$value);
			return $res;
		}
		public function get($key)
		{
			
		}
		public function del()
		{
			# code...
		}
	}

?>