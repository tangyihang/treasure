<?php
//单例获取mysql实例
class Mysql{
 
 public static $con = null;
 
 
 public static function instance(){
 	
 	$config = require_once $_SERVER['DOCUMENT_ROOT'] . '/Application/Common/Conf/config.php';
 	
	if(self::$con == null ){
		self::$con = new PDO($config['DB_DSN'], $config['DB_USER'], $config['DB_PWD']);
	}

	return  self::$con;
 
 }


}


?>