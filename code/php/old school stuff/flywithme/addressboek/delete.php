<?php
include_once 'database.php';

$id = $_GET['id'];

$query = "delete from contact where id = ".$id;

mysql_query($query);
header('Location:addressbook.php');
?>