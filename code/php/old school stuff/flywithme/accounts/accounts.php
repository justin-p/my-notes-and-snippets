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
				<li><a href="accounts.php">accounts</a><li>

	        </ul>
	    </div>
	</div>
		<div id="content">
<h1> Accounts</h1>
<?php
mysql_connect('localhost','root');
mysql_select_db('airport');

$query  = 'select * from accounts';
$result = mysql_query($query);

if ($result)

{
echo '<table> <tr> <td>Username</td> <td>Password</td></tr>';
}
while ($row = mysql_fetch_assoc($result))
{
echo '<tr><td>'.$row['username'].'</td><td>'.$row['password'].'</td>'.
	 '<td><a href="update.php?id='.$row['id'].'">edit</a></td>'.
	 '<td><a href="delete.php?id='.$row['id'].'">delete</a></td></tr>';
}

if ($result)
{
echo '</table>';
}
?>
<p> <a href="new.php">new</a>
</p>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="nagging-menu.js" charset="utf-8"></script>
</body>
</html>