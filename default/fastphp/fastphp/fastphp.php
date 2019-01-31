<?php
/**
 * 
 */
class Fastphp
{
	public $_config;
	public function __construct($arr)
	{
		$this->_config = $arr;
	}

	public function handlerRoute()
	{
		$arr = array();
		$type = $this->_config['path']['target'];
		
		$type = $this->_config['path'][$type];
		// var_dump($type);die;
		if($type == "pathinfo"){
			$url = $_SERVER['REQUEST_URI'];//获取url地址
			$url = trim($url,"/");//去掉地址前面的/
			$arrUrl = explode("?", $url);//将url地址转换成数组形式
			// var_dump($arrUrl);die;
			$arrInfo = $arrUrl[1];//获取到控制器名和方法名
			$secondInfo = explode("&", $arrInfo);//将控制器和方法名分开
			// var_dump($secondInfo);die;
			$arrTmp = array();
	        foreach ($secondInfo as $key => $value) {
	        	$c = explode("=",$value)[1];
	        	// var_dump($c);die;
	        	$arrTmp[]=$c;
	        }
	        // var_dump($arrTmp);die;
			$className = $arrTmp[0];//获取控制器名
			$className = ucfirst($className);//将控制器的名字转换成大写
			$actionName = $arrTmp[1];//获取方法名
		}elseif($type == "url"){
			$url = $_SERVER['REQUEST_URI'];//获取url地址
			$url = trim($url,'/');
			$arrInfo = explode("/",$url);
			$className = !empty($arrInfo[2]) ? $arrInfo[2] : "project";
			$actionName = !empty($arrInfo[3]) ? $arrInfo[3] : "login";
			// print_r($className);die;
		}
		$arr['controller'] = $className;
		$arr['action'] = $actionName;
		// var_dump($arr);die;
		return $arr;

	}
	public function route()
	{
		$arr = $this->handlerRoute();
		$className = ucfirst($arr['controller']);
		$actionName = $arr['action'];
		// echo $className."<br>";
		// echo $actionName;die;
		$objc = new $className($className,$actionName);
		// var_dump($objc);die;
	 	call_user_func_array(array($objc, $actionName), array());
	}

	public function run()
	{
		spl_autoload_register(array($this,'loadClass'));
		Model::$_config = $this->_config;
		$this->save();
		$this->setDebug();
		$this->removeMagicQuotes();
		$this->route();

	}
	public function setDebug()
	{
		if(APP_DEBUG === true){
			error_reporting(E_ALL);
			ini_set('display_errors','On');
		}else{
			error_reporting(E_ALL);
			ini_set('display_error','Off');
			ini_set('log_errors','On');
			ini_set('error_log', RUNTIME_PATH. 'logs/error.log');
		}
	}
	public function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
        return $value;

    }

	public function removeMagicQuotes()
	{
		 if (get_magic_quotes_gpc()) {
            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET ) : '';
            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST ) : '';
            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : '';
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : '';
        }
	}



	public function loadClass($class)
	{
		$freamkwork = APP_PATH."/fastphp/".$class.".php";//获取到文件地址
		$controllers = APP_PATH."/application/controllers/".$class.'.php';
		$views = APP_PATH."/application/views/".$class.'.php';
		$models = APP_PATH."/application/models/".$class.'.php';
		$classes = APP_PATH."classes/$class.php";
		// echo $classes;die;
		// echo $controllers;die;
		if(file_exists($freamkwork)){
			include $freamkwork;
		}elseif(file_exists($controllers)){
			include $controllers;
		}elseif(file_exists($views)){
			include $views;
		}elseif(file_exists($models)){
			// echo $models;die;
			include $models;
		}elseif (file_exists($classes)) {
			include $classes;
		}

	}
	public function save()
	{
		$arr = $this->_config;
		$target = $arr['session']['target'];
		// var_dump($target);die;
		$arrInfo = $arr['session'][$target];
		// var_dump($arrInfo);die;
		if(is_array($arrInfo) && !empty($arrInfo)){
			$path = $arrInfo['path'];
			$handler = $arr['session'][$target]['handler'];
			ini_set("session.save_path",$path);
			// ini_set("session.save_handler",$handler);
		}
	}
}