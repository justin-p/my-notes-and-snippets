<?php

mysql_connect('localhost','root');
mysql_select_db('airport');
$id       = $_POST['id'];
$land 	  = $_POST['land'];
$airportV = $_POST['airportV'];
$airportA = $_POST['airportA'];
$tijdv    = $_POST['tijdv'];
$datumv   = $_POST['datumv'];


$query = "update flight set land = '".$land."' , airportV = '".$airportV."', airportA = '".$airportA."', tijdv = '".$tijdv."', datumv = '".$datumv."'  where id =".$id;
mysql_query($query);

header('Location:results.php');

?>