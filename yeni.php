<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/yakuter.js"></script>

<form name="yeni" action="javascript:void(0);" method="post">
<table style="margin:5px;font-size:12px;">
	<tr>
		<td>İsim</td><td><input class="tekkutu" type="text" name="isim"></td>
	</tr>
	<tr>
		<td>Cep Tel.</td><td><input class="tekkutu" type="text" name="cep"></td>
	</tr>
	<tr>
		<td>Ev Tel.</td><td><input class="tekkutu" type="text" name="ev"></td>
	</tr>
	<tr>
		<td></td><td><input class="tus" type="submit" value="Gönder" onclick="ekle();"></td>
	</tr>
</table>
<div id="ekleniyor"></div>
</form>