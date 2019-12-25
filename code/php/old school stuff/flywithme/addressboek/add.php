<?php
include_once 'database.php';

if (isset($_POST['postback']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
}
else
{
  $name = '';
  $email = '';
  $phone = '';
  $address = '';
}


$query = "insert into contact (name , email , phone ,address)
		values ('$name' , '$email' , '$phone' ,'$address')";
mysql_query($query);
header('Location:addressbook.php');
?>