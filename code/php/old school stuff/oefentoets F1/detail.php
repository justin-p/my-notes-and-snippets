<!<!DOCTYPE html>
<!<html>
<!<head>
  <!<title>Formule 1</title>
  <!<link href="style.css" rel="stylesheet" type="text/css" />
<?php
//mysql_connect('localhost', 'root');
//mysql_select_db('formule1');   
?>

<!</head>

<!<body>
 <! <h1>Formule 1</h1>

		<?php   
		//$id=$_GET['u'];
		//$query =  "select driver.id as id, driver.name as naam, team.name as team from driver 
		//		  left join contract on driver.id = contract.driver_id 
		//		  left join season on season.id = contract.season_id 
		//		  left join team on contract.team_id = team.id 
		//		  where season.year = 2008 AND driver.id=$id";
         //$result = mysql_query($query);
	//	 $row = mysql_fetch_assoc($result);
	//	
	//	$driver_name = $row["naam"];
	//	$team_name = $row["team"];
	//	echo "<h2>Driver:$driver_name</h2> <h2>Team:$team_name </h2> \n";

  ?>
  <!<table border="1" width="350">
    <!<tr>
	<!	<th>Plaats</th>
	<!	<th>Circuit</th>
	  <!</tr>
	    <?php
        //$id=$_GET['u'];
  	//	$query ="select result.position , track.name from result 
	//	left join race on result.race_id = race.id 
	//	left join season on race.season_id = season.id 
	//	left join track on race.track_id = track.id
	//	left join driver on result.driver_id = driver.id
	//	where season.year = 2008 AND driver.id=$id order by result.position";
		
        //$result = mysql_query($query);
	//	while ($row = mysql_fetch_assoc($result))
	//	{
	//	$result_position=$row["position"];
	//	$track_name=$row["name"];
	//	echo"<tr> <td>$result_position</td> <td>$track_name</td> </tr> \n";
	
	//	}
		
		?>
		
		
  <!</table>
<!</body>
<!</html>