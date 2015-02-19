var mland = "Hessen";
var mlandid = 6;

var mjahr = "Abi 2015";
var mjahrid = 0;

var msubject = "Mathematik";
var msubjectid = 2;

var k = "";

function hideall(){
	$("#jahr-dd").hide();
	$("#subjects-dd").hide();
	$(".search").hide();
	//$("#suchbtn").hide();
}

function showsearch(){
	$("#header").show(1000);
}

function jahr(e){
	$("#subjects-dd").show(400);
	$("#jahr-dd").css('background-color', '#9D2933');
	mjahr = $(e).html();
	mjahrid = $(e).attr('value');
	updatewhere();
}

function subject(e){
	$("#ktoggle").show(400);
	$("#subjects-dd").css('background-color', '#9D2933');
	msubject = $(e).html();
	msubjectid = $(e).attr('value');
	updatewhere();
	$("#suchbtn").show(400);
}

function land(e){
	mland = $(e).html();
	mlandid = $(e).attr('value');
	$("#jahr-dd").show(400);
	$("#laender-dd").css('background-color', '#9D2933');
	updatewhere();
}

function updatewhere(){
	$("#where").html("");
	$("#where").append(" <li><a href='#'>" + "Lernen" +"</a> </li>");
	if (mland != ""){
		$("#where").append(" <li><a href='#'>" + mland +"</a> </li>");
	}
	if (mjahr != ""){
		$("#where").append(" <li><a href='#'>" + mjahr +"</a> </li>");
	}
	if (msubject != ""){
		$("#where").append(" <li><a href='#'>" + msubject +"</a> </li>");
	}

}

function dosearch (e){
	updatewhere();
	

	
	$.ajax({ 
		url: 'php/loader.php',
		dataType: "text",
		type: "POST",
		data: {mode: "load", land: mlandid, subject: msubjectid, year: mjahrid}
	}).done(function(msg) {
		
		
		
		
		
		
		var obj = jQuery.parseJSON(msg);
		
		if (obj.length > 0){
			$("#resultscounter").html(obj.length + " Themen in den Handreichngen");
			$("#results").html("");
			for(var i = 0; i < obj.length; i++){
				if(obj[i].type == 1){
					$("#results").append("<h4 style='background-color:#666666;color:white' class='list-group-item' >" + obj[i].text + "</h4>");
				}
				if(obj[i].type == 2){
					
					$("#results").append("<a  class='list-group-item' href='?page=content&land=" + mlandid +"&subject=" + msubjectid +"&year="+ mjahrid +"&theme=" + (parseInt(i)+1)  + "&mode=cards'>" + obj[i].text +"<span style='background-color:#666666' class='badge'>" + obj[i].posts +"</span>  </a>");
				}
			}
			$("#header").slideUp(1000);
			$("#notsearch").hide(400);
			$(".search").show(400);

		}else {
			error("Keine Ergebnisse", "Es tut uns leid, wir haben leider noch keine Ergebnisse für dieses Fach, Land oder Jahr");
			
		}
		
		
		
		
	});
	
	
}