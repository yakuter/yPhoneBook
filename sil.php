<?php
include ("fonksiyon.php");
$db->query("DELETE FROM bilgiler WHERE no='$_POST[tel]'");
echo "ok";
?>