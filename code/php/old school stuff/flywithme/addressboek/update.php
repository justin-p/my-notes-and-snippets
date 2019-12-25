<?php

include_once 'database.php';
$id         = $_POST['id'];
$name 	    = $_POST['name'];
$email      = $_POST['email'];
$phone      = $_POST['phone'];
$address    = $_POST['address'];


$query = "update contact set name = '".$name."' , email = '".$email."', phone = '".$phone."', address = '".$address."' where id =".$id;
mysql_query($query);

header('Location:addressbook.php');

?>