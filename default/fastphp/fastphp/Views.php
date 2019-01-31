<?php
/**
 * 
 */
class Views
{
	public $_config = array();
	private $_className;
	private $_actionName;
	public function __construct($className,$actionName)
	{
		$this->_className = $className;
		$this->_actionName = $actionName;
	}
	//传值
	public function assign($key,$value)
	{
		$res = $this->_config[$key] = $value;
	}
	//视图
	public function display($filename=null)
	{

		extract($this->_config);
		// echo $filename;die;
		$filename = empty($filename)?$this->_actionName : $filename;
		$this->_className = strtolower($this->_className);
		// echo $this->_className;die;
		require APP_PATH."application/views/{$this->_className}/{$filename}".".php";
	}

}

?>