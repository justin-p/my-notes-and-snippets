<?php
mysql_connect('localhost','root');
mysql_select_db('doomla');

		$id 		  = $_POST['id'];
		$tag 	   	  = $_POST['tag'];
		$block        = $_POST['block'];
		$pageoption   = $_POST['pageoption'];
		$pageorder    = $_POST['pageorder'];
		$template     = $_POST['template'];


		$query = "update content set tag = '".$tag."' , block = '".$block."', pageoption = '".$pageoption."', template = '".$template."' where id =".$id;
		mysql_query($query);
	
header('Location:admin.php');
?>