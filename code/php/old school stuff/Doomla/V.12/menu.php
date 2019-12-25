<?php
$page="";
function menu()
{
global $page , $activeclass;
$query = "select * from content where pageoption > ''order by pageorder";
$result = mysql_query($query);

if ($result)
	{
	echo "<ul>\n";
	while ($row = mysql_fetch_assoc($result))
	{
		$tag = $row['tag'];
		$pageoption = $row['pageoption'];
		
		if ($page == $tag)
			{
				$activeclass = '  class=" active"  '; 
				
			}
		else
			{
				$activeclass =  '';
				
			}

		echo "<li $activeclass > <a $activeclass href=\"?page=" . $tag . "\">" .$pageoption . "</a></li>\n";
		
	}
	
	

	echo "</ul\n";
	}
	
}
?>