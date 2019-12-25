<?php
session_start();

mysql_connect("localhost","root","");
mysql_select_db("doomla");

$name     = $_POST['name'];
$password = $_POST['password'];


$query = "select * from user where name =  '$name' and password = $password";

$result = mysql_query($query);
		if ($result)
	        {
		
				$_SESSION['user'] = $name;
				header("location:admin.php");
	        }
	    else
			{
				header("location:login.php");
				
			}
	?>