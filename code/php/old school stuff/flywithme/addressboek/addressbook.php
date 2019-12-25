<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><link href="../style.css" rel="stylesheet" type="text/css" /> </head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<div id="header"></div>

<div id="navi">
	    <div id="menu" class="default">
	        <ul>
	            <li><a href="addressbook.php">accounts</a></li>
	            <li><a href="make a account.html">make a account</a></li>
	        </ul>
	    </div>
	</div>
<div id="content">

<?php
include_once 'database.php';

$query  = 'select * from contact';
$result = mysql_query($query);

if ($result)

{
echo '<table> <tr> <td>name</td> <td>e-mail</td> <td>phone</td> <td>address</td> <td>edit</td> <td>delete</td>  </tr>';
}
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td> <td>'.$row['phone'].'</td> <td>'.$row['address'].'</td>'.
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