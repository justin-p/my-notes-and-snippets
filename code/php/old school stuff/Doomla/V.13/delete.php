<?php
	session_start();
	if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == ''))
	{
		header('Location:admin.php');
		exit();
	}
?>


<?php
mysql_connect('localhost','root');
mysql_select_db('doomla');
$id = $_GET['id'];

$query = "delete from content where id = ".$id;

mysql_query($query);
header('Location:admin.php');
?>