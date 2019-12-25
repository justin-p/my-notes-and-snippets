<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('library');
?>
<!DOCTYPE html >
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
	$query = "select name from author where id = " . $_GET["author_id"];
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$author_name = $row["name"];
?>
 <h1>Geselecteerde boeken voor <?php echo $author_name; ?></h1> 

<?php
  $query = 'select * from book where author.id = '.$_GET["author_id"];
  $result = mysql_query($query);

	$found = false;	
  while ($row = mysql_fetch_assoc($result))
  {
		$found = true;
		
    echo '<p class="title">' . $row['title'] . '</p>';
		echo  " JAAR: ".$row['year'];
		echo " ISBN: " . $row['ISBN']." ";
		echo " INFO: " . $row['description']." ";
		echo '<br/>';
  }
	if (!$found)
	{
		echo "Niets gevonden voor deze schrijver!";
	}
?>

</body>
</html>
