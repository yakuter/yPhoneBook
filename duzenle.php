<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/yakuter.js"></script>
<?php include('fonksiyon.php'); ?>

<?php $tel = $db->get_row("SELECT * FROM ".TABLO." WHERE no='".$_GET['no']."'"); ?>

<form name="yeni" action="javascript:void(0);" method="post">
<table style="margin:5px;font-size:12px;">
	<tr>
		<td>İsim</td><td><input value="<?php echo $tel->isim; ?>" class="tekkutu" type="text" name="isim"></td>
	</tr>
	<tr>
		<td>Cep Tel.</td><td><input value="<?php echo $tel->cep; ?>" class="tekkutu" type="text" name="cep"></td>
	</tr>
	<tr>
		<td>Ev Tel.</td><td><input value="<?php echo $tel->ev; ?>" class="tekkutu" type="text" name="ev"></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:right;">
		<input type="hidden" name="no" value="<?php echo $tel->no; ?>">
		<input class="tus" type="submit" value="Düzenle" onclick="duzenle();"></td>
	</tr>
</table>
<div id="duzenleniyor"></div>
</form>