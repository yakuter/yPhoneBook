<?php
include ("fonksiyon.php");
$sonuc='';

if ($_POST['isim']=='')
	{$sonuc.=  "<font color=red>Lütfen ismi yazınız.</font><br />";}

if (($_POST['cep']=='') and ($_POST['ev']==''))
	{$sonuc.=  "<font color=red>Lütfen cep veya ev telefonunu yazınız.</font>";}

if ($sonuc=='')
	{
		$sql = "UPDATE bilgiler SET isim='$_POST[isim]', cep='$_POST[cep]', ev='$_POST[ev]' WHERE no='$_POST[no]'";
		$db->query($sql);
		echo "ok";
	}
	else
	{
		echo $sonuc;
	}

?>