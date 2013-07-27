<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="resimler/favicon.gif" />

<!-- JS -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<script type="text/javascript" src="js/yakuter.js"></script>

</head>
<body>
<?php include ("fonksiyon.php"); ?>
<div id="govde">

<!-- ÜST KISIM -->
	<div id="enust">
		<div class="menu">
			<a href="index.php">Tümünü Listele</a> | 
			<a href="yeni.php?height=200&width=280" title="Yeni Telefon" class="thickbox">Yeni Kayıt</a> | 
			<a href="javascript:arama_goster();">Arama</a> | 
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
		$kosul=" WHERE isim LIKE '%".$_POST['veri']."%' OR cep LIKE '%".$_POST['veri']."%' OR ev LIKE '%".$_POST['veri']."%'";	
	}
else
	{
		$kosul='';
	}
$sql="SELECT * FROM ".TABLO." $kosul ORDER BY isim LIMIT $b,".LIMIT;
$teller = $db->get_results($sql);
if ($teller!='') 
	{
	foreach ( $teller as $tel )
		{
		$a++;
		if ($a % 2 ==0) { $still="class=\"satir\"";} else { $still=''; }
?>
		<tr <?php echo $still; ?> id="<?php echo $tel->no; ?>">
			<td class="isimcss"><?php echo $tel->isim; ?></td>
			<td class="numaracss"><?php echo $tel->cep; ?></td>
			<td class="numaracss"><?php echo $tel->ev; ?></td>
			<td class="durumcss">
			<a title="Düzenle" href="duzenle.php?no=<?php echo $tel->no; ?>&height=200&width=280" class="thickbox">
			<img src="resimler/duzenle.gif" title="Düzenle"></a> 
			<a href="#" onclick="sil(<?php echo $tel->no;?>)"><img src="resimler/sil.png" title="Sil"></a></td>
		</tr>
<?php
		}
	}
?>		
	
</table>

<!-- SAYFALAMA -->
<div style="padding:15px;">
<?php sayfalama(SITE,$b,LIMIT,TABLO,$kosul); ?>
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