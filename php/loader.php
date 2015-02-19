<?php
	
	include "connection.php";
	include "laender.php";
	include "subjects.php";
	include "years.php";
	
	error_reporting(E_ERROR);
	
	
	//DO GET RESULT
	
	$landid = $_POST['land'];
	
	
	$year = $_POST['year'];
	$year = $year + 1;
	
	$subject = $_POST['subject'];
	
	
	$abfrage = "SELECT * FROM library WHERE land = " .  $landid . " AND year = " . $year . " AND subject = " . $subject  ;
	$ergebnis = mysql_query($abfrage);
	$data = array();
	
	while($row = mysql_fetch_object($ergebnis)){
		$data[] = $row;
	}	

	echo json_encode($data);
	
?>