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
			<th>Message</th>
		</tr>

		
<?php

  $query = "select * from review";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{

  $review_user_id = $row["user_id"];
  $review_item_id = $row["item_id"];
  $review_date = $row["date"];
  $review_time = $row["time"];
  $review_message = $row["message"];



  echo 
  "
  <tr> 
  <td>$review_user_id</td>
  <td>$review_item_id</td>
  <td>$review_date</td>
  <td>$review_time</td>
  <td>$review_message</td>
  </tr>
  \n";
}
?>


</table>
<?php include 'footer.php' ?>
</div>
</body>
</html>