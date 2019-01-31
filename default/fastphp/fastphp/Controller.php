<?php

/**
 * 
 */
class Controller
{
	public $_views;
	public function __construct($className,$actionName)
	{
		$this->_views = new Views($className,$actionName);
	}
}

?>