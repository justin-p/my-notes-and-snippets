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
	
	echo "<tr> <td> ".$tag ." </td>  <td> ".$block ." </td>  <td> ".$pageoption ." </td>  <td>".$pageorder." </td> <td> <a href=delete.php?id=".$row['id']." >delete</a></td> <td><a href=edit.php?id=".$row['id']." >edit</a></td></tr> </td> </tr> ";
	
	}
?>





</table>
<a href="new.html"> blok toevoegen </a> </p>

<a href="index.php"> index </a>

</body>
</html>