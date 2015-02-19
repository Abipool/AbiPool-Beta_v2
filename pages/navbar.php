<nav class="justshadow navbar navbar-default  navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?page=home&mode=cards">AbiPool</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			<li <?php if($page=="start"){ echo 'class="active"';} ?>><a href="?page=start">Start</a></li>
            <li <?php if($page=="content"){ echo 'class="active"';} ?>><a href="?page=content">Lernen</a></li>
            <li <?php if($page=="new"){ echo 'class="active"';} ?>><a href="?page=new">Neu</a></li>
            <li <?php if($page=="subjects"){ echo 'class="active"';} ?>><a href="?page=subjects">Fächer</a></li>
			 <li <?php if($page=="admin"){ echo 'class="active"';} ?>><a href="?page=admin">Admin</a></li>
			
			
          </ul>
		  
		  
		  <div class=" pull-right">
				<form class="navbar-form" role="search" >
				
				<div id="msearchbar" class="input-group" >
								  <input type="text" id="searchform" class="form-control" placeholder="Suche nach ...">
								  <span class="input-group-btn">
								  
								  <button type="button"  id="msubject" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Kein Fach <span class="caret"></span></button>
								  
									<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<?php
										include 'php/subjects.php';
										for ($i = 0; $i < count($subjects); $i++){
											echo '<li  role="presentation"><a style="color: '. $subjects[$i]->color . '" role="menuitem" tabindex="-1" href="#">'. $subjects[$i]->name .'</a></li>';
										}
									
									?>
									  
									</ul>
									<button class="btn btn-default" type="button">Los!</button>
								  </span>
				</div><!-- /input-group -->
				
				</form>

		  
			</div>					
		  
        </div><!--/.nav-collapse -->
      </div>
    </nav>