<!DOCTYPE HTML>

<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('metacritic');   
?>

<html>
<head>
<title> metacritic </title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="container">
		<div class="header"> 
			<h1> Metacritic </h1>
		</div>
		<form action="review.php">
			<p>
				<label>Spel:</label>
				<select name="game_id">

					<option value="1">Dragon Age: Origins</option>
					<option value="2">Professor Layton and the Curious Village</option>
					<option value="3">Braid</option>
					<option value="4">Damnation</option>
					<option value="5">Mass Effect</option>
					<option value="6">LittleBigPlanet</option>
					<option value="7">Overlord</option>
					
			
					 
				</select>
			</p>
			<p>
				<label>website:</label>
				<span class="options">
				
				<?php
				  $query =  "select * from website";
                  $result = mysql_query($query);
				  while ($row = mysql_fetch_assoc($result))
					{
					 $website_id = $row["id"];
					 $website_name = $row["name"];
					 echo "<input type=radio name=website_id value= $website_id > <label>$website_name</label><br/> \n" ;
					  }
					?>
					</span>
			
			</p>
			<input type="submit" value="verstuur" />
		</form>
		
	</div>
</body>
</html>
