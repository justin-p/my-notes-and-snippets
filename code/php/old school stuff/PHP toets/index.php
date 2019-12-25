<html>
<head>
  <title>World</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  
	<?php
	mysql_connect('localhost', 'root');
	mysql_select_db('world');   
	?>
</head>
<body>
<div class="container">
  <h1>World</h1>
  <table border="1" width="800">
    <tr>
      <th>Land</th>
      <th>Regio</th>
	  <th>Inwoners</th>
	  <th>Regering</th>
    </tr>

    
     <?php      $query="select country.id as id ,country.Name, country.Population, country.Region, country.GovernmentForm  from country
		where country.Region = 'Caribbean' 
		order by country.name";
      $result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result))
	{
	$land_naam = $row["Name"];
	$stad_mens = $row["Population"];
	$land_regio = $row["Region"];
	$land_baas = $row["GovernmentForm"];
	$country_id = $row["id"];
	echo "<tr> <td align = center><a href=detail.php?u=$country_id> $land_naam</a></td> <td align = center>$land_regio</td> <td align = center> $stad_mens</td> <td align = center> $land_baas </td> </tr> \n";
	}
?>	 
 </table>
 </div>
</body>
</html>












