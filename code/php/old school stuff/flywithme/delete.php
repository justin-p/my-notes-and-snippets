<?php
mysql_connect('localhost','root');
mysql_select_db('airport');
$id = $_GET['id'];

$query = "delete from flight where id = ".$id;

mysql_query($query);
header('Location:results.php');
?>