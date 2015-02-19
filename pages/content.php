<?php
	include 'php/laender.php';
	include 'php/years.php';
?>

<link href="css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="js/bootstrap-toggle.min.js"></script>
<script src="js/content.js"></script>

<!-- SCRIPT -->

<script src="js/content.js"></script>

<?php
	if (!isset($_GET['theme'])){ //HERE IS ALL THE SEARCHING INTERFACE
?>

<div class="jumbotron" style="background-color:#222;" id="header">
	<div class="container" style="color:#fefefe;">
		<div class="row">
			<h1>Schneller suchen als je zuvor:</h1>
			<p>Passe einfach deinen Filter an:</p>
		</Div>
		
		<div class="row">
		
			<!-- LAENDER AUSWAHL -->
			<div class="btn-group"style="margin-top:3px">
			  <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" id="laender-dd">
				Bundesland
				<span class="caret"></span>
			  </a>
			  
			  
			  <ul class="dropdown-menu">
				<?php
					for ($i = 0; $i<count($laender);$i++){
					?>
					
					<li ><a href="#" value="<?php echo $laender[$i]->id; ?>" onclick="$('#laender-dd').html($(this).html()); land(this);"><?php echo $laender[$i]->name; ?></a></li>
					<?php
					}
				?>
			  </ul>
			</div>
			
			<!-- ABIJAHRGANG SELECTION -->
			<div class="btn-group" style="margin-top:3px">
				  <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" id="jahr-dd">
					 <?php echo $years[0]->name;?>
					<span class="caret"></span>
				  </a>
				  
				  
				  <ul class="dropdown-menu">
					<li ><a href="#" value="0" onclick="$('#jahr-dd').html($(this).html()); jahr(this);"><?php echo $years[0]->name;?></a></li>
					<li ><a href="#" value = "1" onclick="$('#jahr-dd').html($(this).html()); jahr(this);"><?php echo $years[1]->name;?></a></li>
				  </ul>
			</div>
			
			<!-- FACH SELECTION -->
			<div class="btn-group" style="margin-top:3px">
				  <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" id="subjects-dd">
					Kein Fach
					<span class="caret"></span>
				  </a>
				  
				  
				  <ul class="dropdown-menu">
					<?php
					for ($i = 0; $i<count($subjects);$i++){
					?>
					
					<li><a style="color:<?php echo $subjects[$i]->color; ?>" value="<?php echo $subjects[$i]->id; ?>" href="#" onclick="$('#subjects-dd').html($(this).html()); subject(this); "><?php echo $subjects[$i]->name; ?></a></li>
					<?php
					}
				?>
				  </ul>
			</div>
			
			<!-- SUCH BUTTON-->
			<div class="btn-group" style="margin-top:3px">
				 <a class="btn btn-success" onclick="dosearch(this);" href="#" id="suchbtn">
					Suchen
				</a>
				
			</div>
			
			
		</Div>
		
		<div class="row" style="margin-top:20px">
			<i>Bei fertigem Auswählen erscheint der "SUCHEN" Knopf ...</i>
		</div>
		
		
	</div>
	
	
</div>

<div class="container" style="margin-top:20px;padding: 0 20px">
	<div class="row">
		<div class="panel panel-default search" id="search">
			<div class="panel-heading ">Deine Suche:</div>
			<div  class="panel-body ">
				<div class="row">
					<div class="container" >
						<ul class="breadcrumb"  id="where">
								  <li><a href="#">Lernen</a> </li>
						</ul>
					</Div>			
				</div>
				<hr>
				<div class="row">
					<div class="container">
						<small id="resultscounter">0 Ergebnisse</small>
								<a href="?page=content" style="margin-right:5px" class="btn btn-default pull-right">Reset</a>
					</Div>
				</div>
				
			
			</div>
		
		</div>
	</div>
	
	<div class="row">
		<div class="list-group search"  id ="results">
		</div>
	</div>
	
	
	<div class="row" id="notsearch">
		
		<div class="col-md-4 ">
			<div class="panel panel-default">
				<div class="panel-heading">Einfach </div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
					
				</div>
			</div>	
		</div>
		
		<div class="col-md-4 ">
			<div class="panel panel-default">
				<div class="panel-heading">Schnell </div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
					
				</div>
			</div>	
		</div>
		
		<div class="col-md-4 ">
			<div class="panel panel-default">
				<div class="panel-heading">Kein Bullshit </div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
					
				</div>
			</div>	
		</div>
		
		
	</Div>
	
	
	
</div>

<script>hideall();</script>

<?php
	}else{ //HERE IS ALL THE CONTENT_LIST_STUFF INSIDE AN THEME
		$mode = $_GET['mode'];
		$theme = $_GET['theme'];
		$sub = $_GET['subject'];
		
		$abfrage = "SELECT * FROM contentdb WHERE theme = " . $theme ;
		$ergebnis = mysql_query($abfrage);
		$contents = array();
		
		while($row = mysql_fetch_object($ergebnis)){
			$contents[] = $row;
		}
		
	?>


	<div class="jumbotron" style="background-color:<?php echo $subjects[$sub -1]->color; ?>">
	<center>
		<div class="container" >
			<h1 style="color:white">
			<?php
				$abfrage2 = "SELECT * FROM library WHERE id = " . $theme;
				$ergebnis2 = mysql_query($abfrage2);
				
				
				$themerow = mysql_fetch_object($ergebnis2);
				echo $themerow->text;
					
			?>
			
			</h1>
			<p style="color:white"><?php echo $themerow->posts;?> Beiträge</p>
			<?php
			if ($themerow->posts == 0){
				echo '<small style="color:white" >Sei der erste und erstelle einen Beitrag</small>';
			}
			?>
			</div>			
		</div>
	</div>
	</center>		
	
	<?php
	

	echo '<div class="container" style="margin-top:20px;padding: 0 30px;" >';
		echo '<div class="row">';			
			if ($mode=="cards"){
							
							$counter = 0;
							
							for ($i = 0; $i < count($contents); $i++){
							
								if($counter == 0){
									echo '<div class="row">';
								}
								
								?>
								
										
								
								 
									  <div class="  col-sm-6 col-md-3">
									  
											<?php
											$abfrage2 = "SELECT * FROM subjects WHERE id = " . $sub;
											$ergebnis2 = mysql_query($abfrage2);
											$data = array();
											
											$thissubject = mysql_fetch_object($ergebnis2);
											$thisimg = $thissubject->img;
											
											?>
									  
									  
										<div class="thumbnail justshadow" >
										
										
											
										<span style="position:absolute; margin-top:10px;margin-left:10px; background-color:white; color:black" class="badge justshadow" >
											<?php echo $thissubject->name; ?>
										</span>
										 
										  <div style="width:100%;height:200px;background-image:url('<?php if(($contents[$i]->thumbimage) == 'none'  || ($contents[$i]->thumbimage) == '' ){ echo $thisimg;}else{echo $contents[$i]->thumbimage ;}?>'); background-size: cover;background-repeat: no-repeat; background-position: 50% 50%"></div>
										  
										  <div class="caption" style="height:250px;">
											<?php
											
											echo ' <h3>' . $contents[$i]->title . '</h3>';
											echo ' <div style="height:100px;overflow:hidden;"><p align="left" >' . $contents[$i]->thumbtext .'</p></div>';
											
											?>
											<div style="position:absolute;left:30px;bottom:30px">
												<a href="?page=view&url=<?php echo $contents[$i]->content; ?>" style="margin-top:5px;color:white;background-color:<?php echo $thissubject->color; ?>" class="btn btn-default" role="button">Beitrag anzeigen</a>
												
												
												
											</div>
											
											<div style="position:absolute;right:30px;bottom:30px;">
											
												<small align="right" style="color:#777">
													<?php 
													$date = new DateTime();
													$date->format('Y-m-d H:i:s');
													
													$date->setTimestamp($contents[$i]->time / 1000);
													
													echo $date->format('d.m.Y');
													
													
													?>
												</small>
													
												
											
											
											</div>
											
										  </div>
										</div>
									  </div>
								
								
								
								<?php
								if ($counter >= 3){
									echo '</div>';
									$counter = 0;
									$lines = $lines +1;
								}else {
									$counter = $counter + 1;
								}
								
							
							
							}
							
			}
	


?>

		</div> <!-- END OF THE FIRST ROW-> now put there all the other stuff -->
			<div class="row>">
				<div class="panel panel-default  ">
					<div class="panel-heading">Erstelle einen neuen Beitrag zu diesem Thema</div>
					<div class="panel-body">
						<h1>Schreib' was du weißt</h1>
						<p>Teile uns mit was du weißt und lass es alle Leser lesen</p>
						
						
						
						 <a class="btn btn-default" href="?page=new&theme=<?php echo $theme;?>&subject=<?php echo $sub;?>">Beitrag Erstellen</a>
								
						
							
							
					</div>
				</div>
			</div>
	</div>

<?php
	} #END IF
?>
