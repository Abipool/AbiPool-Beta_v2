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
	
	<!-- SOCIAL BUTTONS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/bootstrap-social.css" rel="stylesheet" >
	
  </head>

  <body style="height: 100%; padding-top:50px;background-image:url('img/noise.png');">
	
	<div class="wrapper" style="min-height: 100%;
								position: relative;
	">
	
		<div class="content" style="padding-bottom:160px;">
	
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
				
				if ($page=="subjects"){
					include 'pages/subjects.php';
				}
				
				if ($page=="admin"){
					include 'pages/admin/index.php';
				}
				
			?>
	
		</div>
		<div class="footer" style="width: 100%;
									height: 160px;
									position: absolute;
									bottom: 0;
									left: 0;
									background-color: #333;
									color: white;
		">
			<div class="container" style="position:absolute; left:20%; right:0;">
			
				
				<div class="col-sm-2">
						<h6><a href="footer.html">Impressum</h6>
						<h6><a href="footer.html">Bildnachweis</a></h6>
						<h6><a href="footer.html">Datenschutz</h6>
						<h6><a href="footer.html">Verhaltensrichtlinien</a></h6>
						<h6><a href="footer.html">Nutzungsbedingungen</a></h6>
				
				</div>
			
				
				<div class="col-sm-2">
					<div class="row" >
			
						<h6>	Soziale Netzwerke</h6>
						
						<div style="zoom: 0.8;width:120px; padding-top:15px; ">
							<a class="btn btn-block btn-social btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-facebook']);">
								<i class="fa fa-facebook"></i> Facebook
							</a>
							<a class="btn btn-block btn-social btn-twitter" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-twitter']);">
								<i class="fa fa-twitter"></i>  Twitter
							</a>
						</div>
				
					</div>
				</div>
				
				
				
				<div class="col-sm-3">
					<h6>Coded With:</h6>
					<img width="80px" height="auto" src="img/php-logo.png">
					<img width="60px" height="auto" src="img/html-logo.png">
					<img width="44x" height="auto" src="img/css-logo.png">	
				</div>
					
			</div>
			
        </div>
	</div>
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




