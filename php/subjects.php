<?php
	error_reporting(E_ERROR);
	
	//DO GET ALL SUBJECTS
	$abfrage = "SELECT * FROM subjects";
	$ergebnis = mysql_query($abfrage);
	$subjects = array();
	
	while($row = mysql_fetch_object($ergebnis)){
		$subjects[] = $row;
	}	

	//DO GET ALL Categories
	$abfrage = "SELECT * FROM categories";
	$ergebnis = mysql_query($abfrage);
	$categories = array();
	
	while($row = mysql_fetch_object($ergebnis)){
		$categories[] = $row;
	}	
	
?>