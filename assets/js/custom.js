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
    
    $("button#ListAll").click(function() {
    	$("div#new_contact").hide();
    	$("div#searchBox").hide();
    	$("div#edit_contact").hide();
    	$('#loading').show();
    	$( "#tableList" ).load( "list.php", function() {
    		$('#loading').hide();
		});
	});
	
	$(document).on("click",".editButton", function() {
		$("div#new_contact").hide();
    	$("div#searchBox").hide();
    	$("div#edit_contact").hide().load("edit.php?id="+$(this).attr("value")).show();
	});
	
	$(document).on("click",".delButton", function() {
    	$("div#edit_contact").hide();
	});
	
    
	$(document).on("click","#addButton", function() {
		$.ajax({
			type: "POST",
			url: "new.php",
			data: $("#newContactForm").serialize(),
			beforeSend: function() {$('#loading').show();},
			success: function(data)
			{	
				$( "#tableList" ).load( "list.php", function() {
	    			$('#loading').hide();
				});
			}
		});
	});
	
	$(document).on("click","#searchButton", function() {
		$.ajax({
	       type: "POST",
	       url: "list.php",
	       data: $("#searchForm").serialize(),
	       beforeSend: function() {$('#loading').show();},
	       success: function(data)
	       {	
	       		$('#loading').hide();
	        	$("#tableList").html(data);
	       }
	    });
	});
	
	$(document).on("click","#updateButton", function() {
		$.ajax({
	       type: "POST",
	       url: "update.php",
	       data: $("#editContactForm").serialize(),
	       beforeSend: function() {$('#loading').show();},
	       success: function(data)
	       {	
	        	$( "#tableList" ).load( "list.php", function() {
					$('#loading').hide();
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
		
});