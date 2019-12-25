<?php
mysql_connect('localhost','root');
mysql_select_db('authentication');

$username = $_POST ['username'];
$password = $_POST ['password'];

$query = "insert into account (username,password)
		values ('$username','$password')";
		
mysql_query($query);
?>

<html>
<body>
<p> de gegevens zijn op geslagen</p>
</body>
</html>
