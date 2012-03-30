<?php
session_start();
$path="http://localhost/mi_web/";
class Conectar
{
	public static function conect() 
	{
		$conect=mysql_connect("localhost","admin","123456");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("mi_web");
		return $conect;
	}
}


?>