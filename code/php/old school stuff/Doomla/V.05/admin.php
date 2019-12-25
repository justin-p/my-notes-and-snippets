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
</tr>


<?php
    mysql_connect('localhost', 'root');
    mysql_select_db('doomla');	
	$query = "select * from content";
    $result = mysql_query($query);
	while ($row=mysql_fetch_assoc($result))
	{
	$tag = $row['tag'];
	$block = $row['block'];
	$pageoption = $row['pageoption'];
	echo "<tr> <td> ".$tag ." </td>  <td> ".$block ." </td>  <td> ".$pageoption ." <td><a href=delete.php?id=".$row['id']." >delete</a></td></tr>  </td></tr> ";
	
	}
?>


<a href="new.html"> blok toevoegen </a>


</table>
</body>
</html>