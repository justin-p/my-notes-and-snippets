<?php

$component = "";
function view()
{
	global $page, $component;
	$query = "select * from content where tag = '".$page."'";
	$result = mysql_query($query);
	
	if ($row =  mysql_fetch_assoc($result))
	{
		$component = $row['block'];
	}
	else
	{
	$component = "page ".$page." not found";
	}
	include "templates/template.php";
}
	
	function component()
{
	global $component;
	echo   $component;
}
?>