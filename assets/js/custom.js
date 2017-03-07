$(document).ready(function(){
    $("button#show_new_form").click(function(){
        $("div#new_contact").slideToggle();
    });
    
    $("button#show_search_form").click(function(){
        $("div#search").slideToggle();
    });
    
});

function sil( no )
{
	if( confirm('Kişiyi silmek istediğinizden emin misiniz?') ) {
          $.ajax({
            type: "POST",
            url: "sil.php",
            data: "tel=" + encodeURIComponent(no),
            success: function(cevap)
			{
            	if( cevap === 'ok' )
				{
					$('tr#'+no).hide();
				}
				else 
				{
					alert("Silme işleminde problem çıktı!"); 
				}
			}
		});
	}
}

function duzenle(no){ 
var bilgi = $("input[@type=text]").serialize();
var telno = $("input[@type=hidden]").serialize();
var sc = bilgi+"&"+telno;

$('#ekleniyor').html('<center><img src="resimler/loadingAnimation.gif"></center>');
$.ajax({
	type: "POST",
	url: "duzenle2.php",
	data: sc,
	success: function(msg){
	if (msg=="ok")
		{
		$('#duzenleniyor').html("<font color='blue'>Kayıt Düzenlendi!</font>");
		setTimeout("window.location = 'index.php';",1000);
		}
	else
		{$('#duzenleniyor').html( msg );}
   }
});
}

function ekle(){ 
	var sc = $("input[@type=text]").serialize();
	alert(sc);
	/*$('#ekleniyor').html('<center><img src="resimler/loadingAnimation.gif"></center>');
	$.ajax({
		type: "POST",
		url: "yeni2.php",
		data: sc,
		success: function(msg){
		if (msg=="ok")
			{
			$('#ekleniyor').html("<font color='blue'>Kayıt Eklendi!</font>");
			setTimeout("window.location = 'index.php';",1000);
			}
		else
			{$('#ekleniyor').html( msg );}
	   }
	});
	*/
}