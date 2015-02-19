

<html lang="de">

<?php

if(isset($_GET["ap"]) && $_GET["ap"] == "start" || !isset($_GET["ap"])){
	$ap = "start";
} else {
	if ($_GET["ap"] == "colors"){$ap = "colors";}
}
?>

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
	<?php if($ap == "start"){?>
		<div class="jumbotron" style="background-color:#222">
			<div class="container" style="color:white">
				<h1 align="middle" >Admin Zone</h1>
			</div>
		</div>
	  
	<div class="container">
		<a href="?page=admin&ap=colors" class="btn btn-danger">COLORS</a>
		
		
	</div>
	
	<?php }else { 
		include 'pages/admin/colors.php';
	} ?>
	

  </body>
</html>


