<?php
  $connection = mysql_connect('localhost', 'root');
	
  mysql_select_db('auction');
?>


<!DOCTYPE HTML>




<html>
<head>
	<title>Auction</title>
	<link href="css/layout.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'menu.php'; ?>
	
	
		<table>
		<tr>
			<th>User id</th>
			<th>Item id</th>
			<th>Date</th>
			<th>time</th>
			<th>Offer</th>
		</tr>

		
<?php

  $query = "select * from history";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{

  $history_user_id = $row["user_id"];
  $history_item_id = $row["item_id"];
  $history_date = $row["date"];
  $history_time = $row["time"];
  $history_offer = $row["offer"];



  echo 
  "
  <tr> 
  <td>$history_user_id</td>
  <td>$history_item_id</td>
  <td>$history_date</td>
  <td>$history_time</td>
  <td>$history_offer</td>
  </tr>
  \n";
}
?>


</table>
<?php include 'footer.php' ?>
</div>
</body>
</html>