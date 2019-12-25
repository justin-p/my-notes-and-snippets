<?php

mysql_connect('localhost','root');
mysql_select_db('airport');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "insert into accounts (username,password) values('$username','$password')";
mysql_query($query);
header('location:results.php'); 
?>