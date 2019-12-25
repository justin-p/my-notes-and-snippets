<?php
mysql_connect('localhost','root');
mysql_select_db('doomla');

		$id 		  = $_POST['id'];
		$tag 	   	  = $_POST['tag'];
		$block        = $_POST['block'];
		$pageoption   = $_POST['pageoption'];


		$query = "update content set tag = '".$tag."' , block = '".$block."', pageoption = '".$pageoption."'where id =".$id;
		mysql_query($query);
	
header('Location:admin.php');
?>