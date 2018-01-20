<?php
include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";
include_once "config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$newSql = "INSERT INTO contacts(bookName,author,bDate) VALUES ('$_POST[bookName]','$_POST[author]','$_POST[bDate]')";
$add = $db->query($newSql);
?>