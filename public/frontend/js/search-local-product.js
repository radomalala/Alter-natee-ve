jQuery(document).ready(function($) {
	$(".validateTips").removeClass('hide');
	var buttonText = "";
	if(location.href.replace(/(.+\w\/)(.+)/,"/$2") == "/en"){
		buttonText = "Continue";
	}else{
		buttonText = "Continuer";
	}
	$("#dialog-position").removeClass('hide');
	$( "#dialog-position" ).dialog({
	      modal: true,
	      maxWidth: 1000,
	      minWidth: 500,
	      widht: 900,
	      height: 360,
	      maxHeight: 400,
	      create: function (event, ui) {
		        $(".ui-widget-header").hide();
		    },
	      buttons: {
	      	Search : {
	      		text : buttonText,
	      		class: "centerButton",
	      		click: function(){
		      		var code = $("#postal_code").val();
		      		var distance = $("#distance").val();
		      		$.ajax({
		      			url: 'add-info-cookie',
		      			type: 'GET',
		      			dataType: 'json',
		      			data: {"zip_code": code, "distance": distance},
		      		})
		      		.done(function(data) {
		      			//$(location).attr('href', 'search?q=');
		      			location.reload();
		      		})
		      		.fail(function() {
		      			console.log("error");
		      		})
		      		.always(function() {
		      			console.log("complete");
		      		});
		      	}
	      	}
	      }
	});
	$("#fermer-dialog").click(function(event) {
		event.preventDefault();
		$("#dialog-position").dialog( "close");
		$("#dialog-position").addClass('hide');
	});
	$("#fermer-dialog2").click(function(event) {
		event.preventDefault();
		$("#dialog-position2").dialog( "close");
		$("#dialog-position2").addClass('hide');
	});
    $('#change-location').click(function(e){
    	 show_dialog_position(buttonText);
    });
}); 

function show_dialog_position(buttonText){
	  $("#dialog-position2").removeClass('hide');
		$( "#dialog-position2" ).dialog({
		      modal: true,
		      maxWidth: 1000,
		      minWidth: 500,
		      widht: 900,
		      height: 360,
		      maxHeight: 400,
		      create: function (event, ui) {
			        $(".ui-widget-header").hide();
			    },
		      buttons: {
		      	Search : {
		      		text : buttonText,
		      		class: "centerButton",
		      		click: function(){
			      		var code = $("#postal_code2").val();
			      		var distance = $("#distance2").val();
			      		$.ajax({
			      			url: 'add-info-cookie',
			      			type: 'GET',
			      			dataType: 'json',
			      			data: {"zip_code": code, "distance": distance},
			      		})
			      		.done(function(data) {
			      			//$(location).attr('href', 'search?q=');
			      			location.reload();
			      		})
			      		.fail(function() {
			      			console.log("error");
			      		})
			      		.always(function() {
			      			console.log("complete");
			      		});
			      	}
		      	}
		      }
		});
}