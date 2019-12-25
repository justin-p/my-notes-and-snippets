<?php
mysql_connect ("localhost","root","");
mysql_select_db("doomla");

if (isset($_POST['postback']))
{
  $tag = $_POST['tag'];
  $block = $_POST['block'];
  $pageoption = $_POST['pageoption'];
}
else
{
  $tag = '';
  $block = '';
  $pageoption = '';
}


$query = "insert into content (tag , block , pageoption)
		values ('$tag' , '$block' , '$pageoption')";
mysql_query($query);
header('Location:admin.php');
?>