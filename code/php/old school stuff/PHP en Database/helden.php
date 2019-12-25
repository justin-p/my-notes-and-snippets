<?php
  $connection = mysql_connect('localhost', 'root');
	
  mysql_select_db('helden');
?>

<html>
<head>
  <title>helden</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="center">
	<h1>Helden</h1>

  
    <li id="land"><a href="landen.php">Landen</a></li>
	<li id="land"><a href="helden.php">Helden</a></li>

  <table>
   <tr>
  <th class="left">Naam</th>
  <th>Geboortejaar</th>
  <th>Kracht </th> 
  <th>Intelligentie </th>
  <th>Charisma </th>
  <th>Uithoudingsvermogen</th>
  </tr>
  
  <?php
  $query = "select * from held";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{
  $land_naam = $row["naam"];
  $land_geboortejaar = $row["geboortejaar"];
  $land_kracht = $row["kracht"];
  $land_intelligentie = $row["intelligentie"];
  $land_charisma = $row["charisma"];
  $land_uithoudingsvermogen = $row["uithoudingsvermogen"];
    
  echo 
  "
  <tr> 
  <td>$land_naam</td>
  <td>$land_geboortejaar</td>
  <td>$land_kracht</td>
  <td>$land_intelligentie</td>
  <td>$land_charisma</td>
  <td>$land_uithoudingsvermogen</td>
  </tr>
  \n";
}
?>
 </table>
  </div>
  
</body>
</html>
