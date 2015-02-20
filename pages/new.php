	<!-- CODE HIGHLIGHTER -->
	<script src="cm/lib/codemirror.js"></script> 
	<link rel="stylesheet" href="cm/lib/codemirror.css"> 
	<link rel="stylesheet" href="cm/theme/eclipse.css"> 
 
	<script src="cm/mode/htmlmixed/htmlmixed.js"></script>
	<script src="cm/mode/xml/xml.js"></script>
	<script src="cm/mode/javascript/javascript.js"></script>
	<script src="cm/mode/css/css.js"></script>
	<script src="cm/mode/vbscript/vbscript.js"></script>

	<script src="cm/addon/display/fullscreen.js"></script>
	<script src="cm/addon/selection/active-line.js"></script>
	<script src="cm/addon/edit/closebrackets.js"></script>
	
	<!-- FILE UPLOADS -->
	<script src="js/SimpleAjaxUploader.js"></script>

	
	<?php
 
 $theme = $_GET['theme'];
 
	
	
  $abfrage2 = "SELECT * FROM library WHERE id = " . $theme;
  $ergebnis2 = mysql_query($abfrage2);
  $data = array();
  
  $mtheme = mysql_fetch_object($ergebnis2);
  
  	
 
	
	?>
	
	<div class="jumbotron" style="background-color:#222;">
		<div class="container" style="color:#fefefe;">
			<h1>Erstelle einen neuen Beitrag</h1>
			<p>Teile dein Wissen! Nur so kann diese Seite wachsen!</p>
		</div>
	</div>
	
   <div class="container" style="margin-top:20px"   >
   
   	
   	
   	
   	<div class="panel  panel-danger">
    
    
    
    	<div class="panel-heading">
    	Allgemeines
    	</div>
    
    	<div class="panel-body">
    	
    	
    	
    	<div class="row" style="margin-top:1%" >
     	<div class="col-md-3" style="margin-bottom:20px;">
			
			 
			<a href="#" class="thumbnail">
				<div id="thumbimg" style="width:100%;height:200px;background-image:url('img/placeholder.png'); background-size: cover;background-repeat: no-repeat; background-position: 50% 50%"></div>
			
			</a>
		  
			
			
		   <button id="upload-btn" type="button" class="btn btn-default" >Foto auswählen</button>
			
		   <div id="errormsg" class="clearfix redtext">
		   </div>
		   
		   <div id="pic-progress-wrap" class="progress-wrap" style="margin-top:10px;margin-bottom:10px;">
		   </div>	
		   
		   <div id="picbox" class="clear" style="padding-top:0px;padding-bottom:10px;">
		   </div>

		   <div class="clear-line" style="margin-top:10px;"></div>
		   
			
     	</div>
     	
      
     	<div class="col-md-9">
     	
     	
      <h1 align="left">
		<?php 
		if (isset($_GET['theme'])){
			echo $mtheme->text;
		} else {
			echo 'Bitte Thema auswählen';
		}
		?>
	  </h1>
      <hr>
    	
     	
      <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Titel</span>
        <input id="ftitle" type="text" class="form-control" placeholder="z.B.: Polynomen Division" aria-describedby="sizing-addon2">
      </div>
      
      <div class="input-group" style="margin-top:20px">
        <span class="input-group-addon" >Beschreibung</span>
        <input id="fdesc" type="text" class="form-control" placeholder="z.B.: Polynomen Division ist eine Rechenvorschrift ..." aria-describedby="sizing-addon2">
      </div>
      
      
        <div id="ftags" class="tag-list" style="margin-top: 20px"></div>
      
     	
      
      
      <div class="dropdown"style="margin-top:20px">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
      	Fächer
      	<span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
      	
      	<?php
      	
      	for ($i = 0; $i < count($subjects); $i++){
			echo '<li  onclick="subdropdown(this)" value="' . $subjects[$i]->tag . '" role="presentation"><a style="color: '. $subjects[$i]->color . '" role="menuitem" tabindex="-1"  >'. $subjects[$i]->name .'</a></li>';
      	}
      	
      	?>
      	
      	
        </ul>
      </div>
     	</div> 
     </div> 

    </div>    
   	</div>
   	
   	
   	<div class="row" style="margin-top:20px;">
    <div class="col-md-6" >
    	<div class="panel panel-danger">
     <div class="panel-heading" >Code Editor</div>
    
    	<div class="panel-body" style="margin-left:-15px;margin-top:-15px;margin-bottom:-15px;margin-right:-15px" >
    
     <textarea id="yourcode" style="height:auto;">
<!doctype html>
<h1>JO</h1>
<p>
	Hier kann man seinen Artikel schreiben
</p>

<pre>
Und zwar in HTML
</pre>

<code>
  unser editor hilft dir dabei
</code>


<center>
    <img src="http://mirrors.creativecommons.org/presskit/icons/cc.large.png" width="100px" height="100px">
</center>
  
 


     </textarea>

    	
    	</div>
    </div>
   	</div>
   	
   	
   	<div class="col-md-6">
    <div class="panel panel-danger">
    	<div class="panel-heading" >Vorschau</div>
    	
    	<div class="panel-body">
     <div style="height:67%;padding: 5 5 5 5"  id="htmlresultbox"></div>
    	</div>
   	</div>
    
   	</div>
   	
   
    
   


   
   </div>
    	<div style="margin-top:20px;margin-bottom:20px" >
     <center >
     	<button onclick="post();" type="button" class="btn btn-danger" >Diesen Beitrag hochladen</button>
     </center>
    	</div>	
   	
   
   <script type="text/javascript"> 

   	var mixedMode = {
    name: "htmlmixed",
    scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
     	   mode: null},
     	   
     	  {matches: /(text|application)\/(x-)?vb(a|script)/i,
     	   mode: "vbscript"}]
   	  };
   	  var editor = CodeMirror.fromTextArea(document.getElementById("yourcode"), {
   	  mode: mixedMode,
   	  theme: "eclipse",
   	  lineNumbers: true,
   	  styleActiveLine: true,
   	  viewportMargin: Infinity,
   	  autoCloseBrackets: true,
   	  tabSize: 4,
   	  extraKeys: {
    "F11": function(cm) {
      cm.setOption("fullScreen", !cm.getOption("fullScreen"));
    },
    "Esc": function(cm) {
      if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
    }
   	  }
   	  
   	  });
   	  
   	  
   	editor.on("change", function(from, to, text, removed, origin) {
   	
     document.getElementById('htmlresultbox').innerHTML = editor.getValue();
    
   	});
    
   	document.getElementById('htmlresultbox').innerHTML = editor.getValue();
   	
   	
   	
   </script>
   
</div>

<!-- FILE UPLOADS -->
<script src="js/new.js"></script>


<?php
	if (isset($_GET['subject'])){
		echo '<script> subid = ' . $_GET["subject"] . ';$("#dropdownMenu1").hide(0);</script>';
	}
	if (isset($_GET['theme'])){
		echo '<script> themeid = ' . $_GET["theme"] . ';$("#dropdownMenu1").hide(0);</script>';
	}
?>	

