<?php

	include "connection.php";
	$status = "succes";
	if($err == false){
		
		mysql_select_db("abipoolv2") or die ("Die Datenbank existiert nicht.");
		
		$thumbnail = $_POST['thumbnail'];
		$timestamp = $_POST['timestamp'];
		$desc = $_POST['desc'];
		$subject = $_POST['subject'];
		$title = $_POST['title'];
		$tags = $_POST['tags'];
		$cid = $_POST['currentid'];
		$content = $_POST['content'];
		$theme = $_POST['theme'];
	
		$c_url = $subject . "_" . $timestamp . "_" . $cid . ".html";
		$file = "../posts/" . $c_url;
		
		file_put_contents($file, $content);
		
		$eintrag = "INSERT INTO contentdb
		(thumbimage, thumbtext,  time, subject, content,tags,title, theme )
		VALUES
		('$thumbnail', '$desc', '$timestamp' , '$subject' , '$c_url' , '$tags' , '$title' , '$theme')";
		
		$eintragen = mysql_query($eintrag) or ($status="insert error");
		echo $eintragen;
		
		$aendern = "
			UPDATE library 
			SET posts = posts + 1
			WHERE id = '".$theme."'
		";
		
		$update = mysql_query($aendern);
		
	} else {
	$status = "error";
	}
	
	echo $status;

?>