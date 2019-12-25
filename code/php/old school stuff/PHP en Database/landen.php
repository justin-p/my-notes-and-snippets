<?php
  $connection = mysql_connect('localhost', 'root');
	
  mysql_select_db('helden');
?>

<html>
<head>
  <title>landen</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="center">
	<h1>Landen</h1>
 
  
    <li id="land"> <a href="landen.php"> Landen</a></td>
	<li id="land"> <a href="helden.php"> Helden</a></td>

	
	<ul>
  <?php
  $query = "select * from land";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{
  $land_naam = $row["naam"];
  $land_hoofdstad = $row["hoofdstad"];
    
  echo "<li>$land_naam ($land_hoofdstad)</li>\n";
}
?>
</ul>
  </div>
  
</body>
</html>
