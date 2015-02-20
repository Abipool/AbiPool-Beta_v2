<div class="container" style="margin-top:2%;margin-bottom:1%">
<div class="col-md-12">
	
<?php
$counter = 0;

for ($i = 0; $i<count($subjects);$i++){

	if($counter == 0){
			echo '<div class="row">';
	}
	
	?>
	
	
	<div   class="col-xs-6 col-md-2">
		<a href="#"  class="thumbnail justshadow ">
			<img src="<?php echo $subjects[$i]->img; ?>" alt="...">  
		</a>
		<h4 align="middle" ><?php echo $subjects[$i]->name; ?></h4>
	</div>
	
						
	
	<?php
	
	if ($counter >= 5){
		echo '</div>';
		$counter = 0;
		
	}else {
		$counter = $counter + 1;
	}	
	

}

?>
		

	</div>
</div>





</div>