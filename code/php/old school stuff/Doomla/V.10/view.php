<?php

$component = "";

function view()
{
	global $page, $component;
	$query = "select * from content where tag = '".$page."'";
	$result = mysql_query($query);
    $template  = "template.php";
	
	if ($row =  mysql_fetch_assoc($result))
	{
		$component = $row['block'];
	}
	else
	{
	$component = "page ".$page." not found";
	}
	
	if (isset($row['template']) && $row['template'] >"")
	{
	$template = $row['template'];
	}
	
		include "templates/" . $template;
	
}

	function component()
{
	global $component;
	echo   $component;
}
?>