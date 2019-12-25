<?php
function menu()
{
mysql_connect ("localhost","root","");
mysql_select_db("doomla");

$query = "select * from content where pageoption > ''order by pageorder";
$result = mysql_query($query);
if ($result)
	{
	echo "<ul>\n";
	while ($row = mysql_fetch_assoc($result))
		{
		$tag = $row['tag'];
		$pageoption = $row['pageoption'];
		echo "<li><a href=\"?page=" . $tag . "\">" .$pageoption . "</a></li>\n";
		
		}
	echo "</ul\n";
	}
}
?>