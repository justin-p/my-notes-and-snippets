<?php
	include_once "menu.php";
	include_once "view.php";
    mysql_connect('localhost', 'root');
    mysql_select_db('doomla');	
	
	if (isset ($_GET['page']))
	{
	$page=$_GET['page'];
	}
	else
	{
	$page='home';
	}
	view();	
?>
<a href="admin.php"> admin </a>
<a href="login.php"> login </a>