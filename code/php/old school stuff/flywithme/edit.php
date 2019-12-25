<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<div id="header"></div>
<div id="content">
<form action="update.php" method="post">

<?php
mysql_connect('localhost','root');
mysql_select_db('airport');
$id     = $_GET['id'];
$query  = "select * from flight where id = ".$id;


$result = mysql_query($query);
$row	= mysql_fetch_assoc($result);
?>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<p>
<label> Land: <label> <input type="text" name="land" value="<?php echo $row ['land']; ?>" />
</p>
<p>
<label> Airport vertrek:<label><input type="text" name="airportV" value="<?php echo $row ['airportV']; ?>" />
</p>
<p>
<label> Airport aankomst:<label><input type="text" name="airportA" value="<?php echo $row ['airportA']; ?>" />
</p>
<p>
<label> tijd vertrek:<label><input type="text" name="tijdv" value="<?php echo $row ['tijdv']; ?>" />
</p>
<p>
<label> datum vertrek:<label><input type="text" name="datumv" value="<?php echo $row ['datumv']; ?>" />
</p>
<p>
<input type="submit" value="verstuur" />
</p>
</form>
</div>
</body>
</html>