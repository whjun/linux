<?php
	$arr = array(
		'db' => array(
			'host'=>'127.0.0.1',
			'db_user'=>'root',
			'db_pwd'=>'root',
			'db_name'=>'month11',
		),
		'session' => array(
			'files'=>array(),
			'memcache'=>array(
				'path'=>"tcp://127.0.0.1:11211",
				'handler'=>'memcache',
			),
			'target'=>'memcache',
		),
		'path' => array(
				1=>'pathinfo',
				2=>'url',
				'target'=>1,
		),
	);
	
?>