<?php

mysql_connect('localhost','root');
mysql_select_db('airport');
$id       = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "update accounts set username = '".$username."' , password = '".$password."' where id =".$id;
mysql_query($query);
header('Location:results.php');
?>