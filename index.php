<!DOCTYPE html>
<html lang="tr-TR">

<head>

	<meta charset='UTF-8' />
	<title>ytelefon | Yakuter Telefon Defteri</title>

	<!-- META -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="tr" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="Bu betik pratik ve sade bir telefon defteridir." />
	<meta name="keywords" content="yakuter,telefon,defter,betik,php,js,css" />
	<meta name="robots" content="all" />
	<meta name="language" content="tr-TR" />
	<meta name="location" content="türkiye, tr, turkey" />
	<meta name="author" content="Erhan YAKUT - http://www.yakuter.com" />
	
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/thickbox.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="assets/images/favicon.gif" />

	<!-- JS -->
	<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="assets/js/yakuter.js"></script>

</head>
<body>
	
<!-- DATABASE CONNECTION -->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	include_once "includes/ez_sql_core.php";
	include_once "includes/ez_sql_mysqli.php";
	include_once "includes/config.php";
	$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
	$db->query("SET NAMES utf8"); 
	
?>
<!-- //DATABASE CONNECTION -->

<div id="govde">

<!-- ÜST KISIM -->
	<div id="enust">
		<div class="menu">
			<a href="index.php">Tümünü Listele</a> | 
			<a href="javascript:new_contact();" title="Yeni Telefon">Yeni Kayıt</a> | 
			<a href="javascript:search();">Arama</a> | 
		</div>
	</div>

<!-- ARAMA FORMU -->
<div id="arama">
	<form name="arayacakform" method="post" action="index.php">
		<fieldset style="border:1px solid #ffffff;padding-bottom:5px;">
		<legend>Arama Kutusu</legend>
			<input style="margin-left:10px;" class="tekkutu" type="text" id="veri" name="veri">
			<input class="tus" type="submit" value="Ara...">
			İsim veya telefon yazabilirsiniz...
		</fieldset>
	</form>
</div>

<!-- NEW CONTACT -->
<div id="new-contact">
	<form name="new-contact-form" method="post" action="index.php">
		<legend>Arama Kutusu</legend>
		<input type="text" name="name" id="name">
		<input type="text" name="phone" id="phone">
		<input type="text" name="email" id="email">
		<input type="submit" value="Search...">
	</form>
</div>

<!-- İÇERİK KISMI -->
<div id="icerik">
<?php if (!isset($_GET['b'])) { $b=0; } else { $b = $_GET['b']; } ?>	
	<table style="margin-left:10px;width:540px;">
		<tr>
			<td class="isimcss" style="height:30px; background-color:#EEEEEE"><b>İsim</b></td>
			<td class="numaracss"  style="background-color:#EEEEEE"><b>Cep Telefonu</b></td>
			<td class="numaracss" style="background-color:#EEEEEE"><b>Ev Telefonu</b></td>
			<td class="durumcss" style="background-color:#EEEEEE"><b>Durum</b></td>
		</tr>
<?php
if (isset($_POST['veri'])) 
	{
		$kosul=" WHERE name LIKE '%".$_POST['veri']."%' OR phone LIKE '%".$_POST['veri']."%' OR email LIKE '%".$_POST['veri']."%'";	
	}
else
	{
		$kosul='';
	}
$sql="SELECT * FROM $db_table $kosul ORDER BY name LIMIT $b, $limit";
$teller = $db->get_results($sql);
$a=0;
if ($teller!='') 
	{
	foreach ( $teller as $tel )
		{
		$a++;
		if ($a % 2 ==0) { $still="class=\"satir\"";} else { $still=''; }
?>
		<tr <?php echo $still; ?> id="<?php echo $tel->id; ?>">
			<td class="isimcss"><?php echo $tel->name; ?></td>
			<td class="numaracss"><?php echo $tel->phone; ?></td>
			<td class="numaracss"><?php echo $tel->email; ?></td>
			<td class="durumcss">
			<a title="Düzenle" href="duzenle.php?no=<?php echo $tel->no; ?>&height=200&width=280" class="thickbox">
			<img src="assets/images/duzenle.gif" title="Düzenle"></a> 
			<a href="#" onclick="sil(<?php echo $tel->no;?>)"><img src="assets/images/sil.png" title="Sil"></a></td>
		</tr>
<?php
		}
	}
?>		
	
</table>

<!-- SAYFALAMA -->
<div style="padding:15px;">
<?php sayfalama($site_url,$b,$limit,$db_table,$kosul); ?>
</div>
		
</div><!-- içerik kısmı bitişi -->

<!-- ALT KISIM -->
<div id="alt">
	<a href="bilgi.php?height=300&width=400" title="ytelefon | Yakuter Telefon Defteri" class="thickbox">Bilgi</a> &nbsp;|&nbsp;
	<a href="http://www.yakuter.com/ytelefon-yakuter-telefon-defteri/">Yardım</a> &nbsp;|&nbsp;
	Telif Hakkı &copy; 2008 &nbsp;|&nbsp; 
	<a href="http://www.yakuter.com/">Yakuter</a>
</div><!-- alt kısım bitişi -->
		
</div><!-- gövde bitişi -->

</body>
</html>