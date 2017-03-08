<?php
include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
$db->query("DELETE FROM contacts WHERE id='$_POST[id]'");
?>