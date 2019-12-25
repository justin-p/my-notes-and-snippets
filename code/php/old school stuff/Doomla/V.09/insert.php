<?php
mysql_connect ("localhost","root","");
mysql_select_db("doomla");

if (isset($_POST['postback']))
{
  $tag = $_POST['tag'];
  $block = $_POST['block'];
  $pageoption = $_POST['pageoption'];	
  $pageorder = $_POST['pageorder'];
	
}
else
{
  $tag = '';
  $block = '';
  $pageoption = '';
  $pageorder = '';
}


$query = "insert into content (tag , block , pageoption, pageorder)
		values ('$tag' , '$block' , '$pageoption', '$pageorder')";
mysql_query($query);
header('Location:admin.php');
?>