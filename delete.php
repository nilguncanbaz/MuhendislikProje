<?php
include_once "ez_sql_core.php";
include_once "ez_sql_mysqli.php";
include_once "config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
$db->query("DELETE FROM contacts WHERE id='$_POST[id]'");
?>