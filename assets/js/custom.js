$(document).ready(function(){
    $("button#show_new_form").click(function(){
    	$("div#searchBox").hide();
    	$("div#edit_contact").hide();
        $("div#new_contact").toggle();
    });
    
    $("button#show_search_form").click(function(){
    	$("div#edit_contact").hide();
        $("div#new_contact").hide();
        $("div#searchBox").toggle();
    });
    
    $("#ListAll").click(function() {
    	$("div#new_contact").hide();
    	$("div#searchBox").hide();
    	$("div#edit_contact").hide();
    	
    	$( "#tableList" ).load( "list.php", function() {
    		$('#loading').show().delay(100000);
    		$('#loading').hide().delay(100000);
		});
	});
	
	$(document).on("click",".editButton", function() {
		$("div#new_contact").hide();
    	$("div#searchBox").hide();
	});
	
	$(document).on("click",".delButton", function() {
    	$("div#edit_contact").hide();
	});
    
	$("#addButton").click(function() {
		$.ajax({
			type: "POST",
			url: "new.php",
			data: $("#newContactForm").serialize(),
			success: function(data)
			{	
				$( "#tableList" ).load( "list.php", function() {
	    			$('#loading').show().delay(100000);
	    			$('#loading').hide().delay(100000);
				});
			}
		});
	});
	
	$("#searchButton").click(function() {
		$.ajax({
	       type: "POST",
	       url: "list.php",
	       data: $("#searchForm").serialize(),
	       beforeSend: function() {$('#loading').show().delay(100000);},
	       success: function(data)
	       {	
	       		$('#loading').hide().delay(100000);
	        	$("#tableList").html(data);
	       }
	    });
	});
	
	$(document).on("click","#updateButton", function() {
		$.ajax({
	       type: "POST",
	       url: "update.php",
	       data: $("#editContactForm").serialize(),
	       beforeSend: function() {$('#loading').show().delay(100000);},
	       success: function(data)
	       {	
	        	$( "#tableList" ).load( "list.php", function() {
					$('#loading').hide().delay(100000);
				});
	       }
	    });
	});
	
	$(document).on("click",".delButton", function() {
		var trID = 'tr#'+$(this).attr("value");
		$.ajax({
	       type: "POST",
	       url: "delete.php",
	       data: "id=" + $(this).attr("value"),
	       success: function(data)
	       {	
	       		$(trID).fadeOut();
	       }
	    });
	});
	
	$(document).on("click",".editButton", function() {
		$("div#edit_contact").hide().load("edit.php?id="+$(this).attr("value")).show();
	});
		
});


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