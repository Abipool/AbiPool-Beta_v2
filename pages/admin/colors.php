<?php 
	if(isset($_GET['file'])){
		$file = $_GET['file'] ;
	}else{
		$file = 'css/bootstrap.css';
	}
	
?>


<html lang="de">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Julius">
    <title>Bootstrap Colors</title>
	
	<!-- JQUERY STUFF-->
	<script src="js/jquery.js"></script>
	<script src="js/csscolorparser.js"></script>

	 <!-- Bootstrap core  -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.js"></script>
	
  </head>

  
  <body style="margin-top:20px;">
	
	<div id="raw" >
		<?php 
			echo file_get_contents($file);
		?>
	</div>
  
	<div class="container">
		
		<h1 align="middle">Our Bootstrap Colors</h1>
		<hr></hr>
		<div class="row">		
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Farbe ändern</div>
					<div class="panel-body">
						<input class="form-control" id="edit"></input>
						<br>
						<a onclick="change()" class="btn btn-default">Farbe ändern</a>					
					</div>
				</div>
			</div>
		
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">Farben</div>
					<div class="panel-body">
						<div id="clist" >
					
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
  </body>
</html>

<script>
	var counter = 0;
	
	//HIDE THE RAW CONTENT
	var raw = $("#raw").html();
	$("#raw").hide(0);
	
	//LOOP THROUGH
	var last = 0;
	var count = occurrences(raw,"#", true); //CALC THE AMOUNTOF '#'
	var result = new Array();
	
	for (var i = 0; i < count; i++){ //LOOP THROUGH
		var n = raw.indexOf("#",last);
		n = n +1;
		var c = "#";
		
		for ( var k = 0; k < 6; k++){
			if ( parseCSSColor(c) == 'null'){
				c += raw.charAt(n+k)
			} else {
				if (parseCSSColor(c + raw.charAt(n+k) + raw.charAt(n+k + 1) + raw.charAt(n+k + 2)) == 'null'){
					k = 6;
				} else {
					c += raw.charAt(n+k) + raw.charAt(n+k + 1) + raw.charAt(n+k + 2);
				}
				
				
				
			}
			
		}
		c = c.replace(";" , "");
		c = c.replace("}" , "");
		c = c.replace("]" , "");
		c = c.replace("[" , "");
		c = c.replace('"' , "");
		c = c.replace(":" , "");
		c = c.replace("'" , "");
		result[i] = c;
		last = n ;
	}
	
	var tmp = [""];
	var t = 0;
	for (var i = 0; i < count; i++){
		if ($.inArray(result[i], tmp) === -1){
			tmp[t] = result[i];
			t++;
			addcolor(result[i] , result[i]);
		} else {
			
		}
		
	}
	
	
	//CONTAINS METHOD
	function contains(a, obj) {
		var i = a.length;
		while (i--) {
		   if (a[i] === obj) {
			   return true;
		   }
		}
		return false;
	}
	
	
	
	$( ".i" ).click(function() {
		var col = tmp[$(this).attr('value') ];
		$("#edit").val(col);
	});
	
	function change(){
		var teemp = $("#edit").val();
		alert(teemp);
	}
	
	//CODE TO ADD ONE ITEM
	var toggle = true;
	function addcolor(color,name){
		
		var str = "";
		var c = parseCSSColor(color);
		
		
		
		if (toggle){
			str = '<p  value="' + counter + '" class="i btn" align="middle"  style="float:right;border: 1px solid #c0c0c0;margin-top:5px;width:48%;background-color: rgba(' + c[0] + ',' + c[1] + ',' + c[2]  + ',' + c[3] + ')">' + "<br>" +  "</p>";
			toggle = false;
		} else {
			str = '<p value="' + counter + '"  class="i btn" align="middle" style=" border: 1px solid #c0c0c0;margin-top:5px;width:48%;background-color: rgba(' + c[0] + ',' + c[1] + ',' + c[2]  + ',' + c[3] + ')">'+ "<br>"  + "</p>";
			toggle = true;
		}
		
		
		counter = counter +1;
		$("#clist").append(str);
	}
	
	//COUNT A SUBSTRING
	function occurrences(string, subString, allowOverlapping){
		string+=""; subString+="";
		if(subString.length<=0) return string.length+1;

		var n=0, pos=0;
		var step=(allowOverlapping)?(1):(subString.length);

		while(true){
			pos=string.indexOf(subString,pos);
			if(pos>=0){ n++; pos+=step; } else break;
		}
		return(n);
	}
</script>






