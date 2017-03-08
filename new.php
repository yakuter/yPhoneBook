<?php
include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$newSql = "INSERT INTO contacts(name,phone,email) VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]')";
$add = $db->query($newSql);
?>