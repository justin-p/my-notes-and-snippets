

<!DOCTYPE html>
<!<html>
<!<head>
  <!<title>Formule 1</title>
  <!<link href="style.css" rel="stylesheet" type="text/css" />
<?php
 // mysql_connect('localhost', 'root');
 // mysql_select_db('formule1');   
?>

<!</head>

<!<body>
<!<div>
  <!<h1>Formule 1</h1>
  <!<h2>Season 2008</h2>
  <!<table border="1" width="350"> 
    <!<tr>
	  <!<th>Driver</th>
      <!<th>Team</th>
    <!</tr>
  <?php//   $query =  "select driver.id as id, driver.name as naam, team.name from driver 
  //left join contract on driver.id = contract.driver_id 
  //left join season on season.id = contract.season_id 
  //left join team on contract.team_id = team.id 
  //where season.year = 2008 order by driver.name ASC";
    //  $result = mysql_query($query);
	//while ($row = mysql_fetch_assoc($result))
	//{
	//$driver_name = $row["naam"];
	//$driver_team = $row["name"];
	//$driver_id = $row["id"];
	//echo "<tr> <td><a href=detail.php?u=$driver_id> $driver_name</a></td> <td>$driver_team</td> </tr> \n";
	//}
?>




<!  </table>
 <! <div>
<!</body>
<!</html>
