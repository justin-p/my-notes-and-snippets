<?php
mysql_connect('localhost','root');
mysql_select_db('airport');

$land     = $_POST ['land'];
$airportV = $_POST ['airportV'];
$airportA = $_POST ['airportA'];
$tijdV    = $_POST ['tijdV'];
$datumV   = $_POST ['datumV'];

$query = "insert into flight (land , airportV , airportA ,tijdV , datumV)
		values ('$land' , '$airportV' , '$airportA' ,'$tijdV' , '$datumV')";
mysql_query($query);
header('Location:results.php');
?>