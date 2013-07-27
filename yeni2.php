<?php
include ("fonksiyon.php");
$sonuc='';

if ($_POST['isim']=='')
	{$sonuc.=  "<font color=red>Lütfen ismi yazınız.</font><br />";}

if (($_POST['cep']=='') and ($_POST['ev']==''))
	{$sonuc.=  "<font color=red>Lütfen cep veya ev telefonunu yazınız.</font><br />";}

if ($sonuc=='')
	{
		$sql = "INSERT INTO bilgiler(isim,cep,ev) VALUES ('$_POST[isim]','$_POST[cep]','$_POST[ev]')";
		$islem = $db->query($sql);
		echo "ok";
	}
	else
	{
		echo $sonuc;
	}

?>