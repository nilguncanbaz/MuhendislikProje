<?php
include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$updateSql = "UPDATE contacts SET bookName='$_POST[bookName]', author='$_POST[author]', bDate='$_POST[bDate]' WHERE id='$_POST[id]'";
$db->query($updateSql);
?>