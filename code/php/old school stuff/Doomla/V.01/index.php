<?php
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
			
			

	$query= "select * from content where tag= '".$page."'";
			
			$result = mysql_query($query);
			
			if ($row = mysql_fetch_assoc($result))
			{
			$component = $row['block'];
			}
			else
			{
			$component = "page ".$page." not found";
			}
			
	include "templates/template.php";
?>