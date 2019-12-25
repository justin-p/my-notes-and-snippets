<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link href="style.css" rel="stylesheet" type="text/css" /> </head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<div id="header"></div>

<div id="navi">
	    <div id="menu" class="default">
	        <ul>
	            <li><a href="index.html">Boeken</a></li>
	            <li><a href="results.php">Vluchten</a></li>

	        </ul>
	    </div>
	</div>
<div id="content">

<?php
mysql_connect('localhost','root');
mysql_select_db('airport');

$query  = 'select * from flight';
$result = mysql_query($query);

if ($result)

{
echo '<table> <tr> <td>land</td> <td>airport vertrek</td> <td>airport aankomst</td> <td>tijd vertrek</td> <td>datum vertrek</td> <td>edit</td> <td>delete</td>  </tr>';
}
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td>'.$row['land'].'</td><td>'.$row['airportA'].'</td> <td>'.$row['airportV'].'</td> <td>'.$row['tijdV'].'</td> <td>'.$row['datumV'].'</td>'.
	 '<td><a href="edit.php?id='.$row['id'].'">edit</a></td>'.
	 '<td><a href="delete.php?id='.$row['id'].'">delete</a></td></tr>';
}

if ($result)
{
echo '</table>';
}
?>
</table>

</div>

</body>
</html>