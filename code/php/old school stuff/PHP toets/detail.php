<!DOCTYPE html>
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
    <?php
 $id=$_GET['u'];
 $query="select country.Name as naam, country.Continent, city.name, countrylanguage.Language  from country
left join countrylanguage on country.id = countrylanguage.Country_ID
left join city on city.Country_ID = country.ID
where country.ID = '$id' "; 
$result = mysql_query($query); 
	$row = mysql_fetch_assoc($result);
	{
	$land_naam = $row["naam"];
	$land_cont = $row["Continent"];
	$land_hoofd = $row["name"];
	echo" <h2>Land: $land_naam </h2>
	<h2>Continent: $land_cont</h2>
	<h2>Hoofdstad: $land_hoofd</h2>";
	}
?>

    
    
    
  
  <h3>De gesproken talen zijn:</h3> 
	<ul>
  <?php 
  $id=$_GET['u'];
 $query="select country.Name as naam, country.Continent, city.name, countrylanguage.Language  from country
left join countrylanguage on country.id = countrylanguage.Country_ID
left join city on city.Country_ID = country.ID
where country.ID = '$id' ";
      $result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result))
	{
	$taal = $row["Language"];
	echo "<li>$taal</li>";
	}
	
  ?>
   </ul>
	
	<p><A href="index.php">Home page</a></p>
 </div>
</body>
</html>













