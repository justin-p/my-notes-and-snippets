<?php
	session_start();
	if(!isset($_SESSION['user']) || (trim($_SESSION['user']) == ''))
	{
		header("location: index.php");
		exit();
	}
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<table>

<tr>
<th> tag </th>
<th> blok </th>
<th> paginaoption </th>
<th> paginaorder </th>
<th> template </th>
<th> delete </th>
<th> edit </th>
</tr>


<?php	
    mysql_connect('localhost', 'root');
    mysql_select_db('doomla');
	$query = "select * from content";
    $result = mysql_query($query);
	while ($row=mysql_fetch_assoc($result))
	{
	$id = $row['id'];
	$tag = $row['tag'];
	$block = $row['block'];
	$pageoption = $row['pageoption'];
	$pageorder = $row['pageorder'];
	$template = $row['template'];
	
	echo "<tr> <td> ".$tag ." </td>  <td> ".$block ." </td>  <td> ".$pageoption ." </td>  <td>".$pageorder." </td> <td>".$template." </td> <td> <a href=delete.php?id=".$row['id']." >delete</a></td> <td><a href=edit.php?id=".$row['id']." >edit</a></td></tr> </td> </tr> ";
	
	}
?>





</table>
<p><a href="new.php"> blok toevoegen </a> </p>

<p><a href="index.php"> index </a> </p>
<p><a Href="logout.php"> logout </a></p>

</body>
</html>