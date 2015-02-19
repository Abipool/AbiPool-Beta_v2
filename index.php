<?php

include 'php/connection.php';

if(isset($_GET["page"]) && $_GET["page"] == "start" || !isset($_GET["page"])){
	$page =  'start';
	
}else{ 
	
	
	if ($_GET["page"] == "start"){
		$page =  'start';
	}
	
	if ($_GET["page"] == "content"){
		$page =  'content';
	}
	
	if ($_GET["page"] == "subjects"){
		$page =  'subjects';
	}
	
	if ($_GET["page"] == "new"){
		$page =  'new';
	}
	
	if ($_GET["page"] == "admin"){
		$page =  'admin';
	}
	
	if ($_GET["page"] == "view"){
		$page =  'view';
		$url= $_GET["url"];
		$url_id= $_GET["id"];
	}
}

?>

<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Abipool Rocks">
    <meta name="author" content="Julius">
	<meta name="theme-color" content="#222222">
	<meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" href="../../favicon.ico">

    <title>AbiPool_v2</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
	
	<!-- JQUERY STUFF-->
	<script src="js/jquery.js"></script>

		
	<!-- popups -->
	<link href="css/magnific-popup.css" rel="stylesheet">
	<script src="js/jquery.magnific-popup.js"></script>
    
	<!-- Tags PlugIn -->
	<script src='js/bootstrap-tags.js'></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-tags.css" />
	
	
  </head>

  <body style="padding-top:60px;background-image:url('img/noise.png');">
	
		<?php
			include 'pages/navbar.php';	
			
			if ($page=="start"){
				include 'pages/start.php';
			}
			
			if ($page=="content"){
				include 'pages/content.php';
			}
			
			if ($page=="new"){
				include 'pages/new.php';
			}
			
			if ($page=="admin"){
				include 'pages/admin/index.php';
			}
			
		?>
	
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script src="js/bootstrap.js"></script>
    <script src="js/docs.min.js"></script>
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	
	<!-- MY SCRIPTS-->
	<script src="js/home.js"></script>
	
	
  </body>
</html>




