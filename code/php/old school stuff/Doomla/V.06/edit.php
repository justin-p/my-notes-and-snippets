<html>
<head>

</head>
<body>
<form action="update.php" method="post">

<?php
    mysql_connect('localhost', 'root');
    mysql_select_db('doomla');	
	
if (isset($_POST['postback']))
{
  $tag = $_POST['tag'];
  $block = $_POST['block'];
  $pageoption = $_POST['pageoption'];

}
else
{
  $id = $_GET['id'];
  $query = "select * from content where id=$id";
  $result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result))
	{
		$tag = $row['tag'];
		$block = $row['block'];
		$pageoption = $row['pageoption'];
	}
}

?>

<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>
<label> tag: <label> <input type="text" name="tag" value="<?php echo $tag; ?>" />
</p>
<p>
<td><label> block:<label></td>
<td><textarea size="75" type ="text" name="block" value="<?php echo $block; ?>"> </textarea></td>
</p>
<p>
<label> paginaoption:<label><input type="text" name="pageoption" value="<?php echo $pageoption; ?>" />
</p>
 
<p>
<input type="submit" value="verstuur" />
</p>
</form>
</div>
</body>
</html>