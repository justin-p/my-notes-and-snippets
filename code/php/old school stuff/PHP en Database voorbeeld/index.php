 
<?php
  // maak een verbinding met MySQL
  $connection = mysql_connect('localhost', 'root');
	
  // geef aan welke database we willen gebruiken
  mysql_select_db('metacritic');
?>

<html>
<head>
  <title>Metacritic</title>
</head>

<body>
  <ul>
  <?php
  // maak een query om alle spellen op te vragen
  $query = "select * from game";
  
  // voer de query uit
  $result = mysql_query($query);
  
  // loop door alle rijen heen
while ($row = mysql_fetch_assoc($result))
{
  // haal gegevens die we nodig hebben uit de rij
  $game_name = $row["name"];
  $game_platform = $row["platform"];
    
  // maak een lijst item aan op de pagina
  echo "<li>$game_name ($game_platform)</li>\n";
}

?>

  </ul>
</body>
</html>

