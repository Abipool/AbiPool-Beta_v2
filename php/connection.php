<?php
	$err = false;
	error_reporting(E_ERROR);	
	$verbindung = mysql_connect("localhost", "webpool","webpool") or ($err = true) ;
	mysql_select_db("abipoolv2") or ($serror = true);
?>