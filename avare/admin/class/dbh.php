<?php

class Dbh{

private static  $db;

	protected static function db(){
		try{
		self::$db=new PDO('mysql:host=localhost;dbname=avare','root','admin000');
		self::$db->exec("set names utf8");
		return self::$db;	
	}catch(PDOException  $e){
		$e->getMessage();
	}
	}

	
}

