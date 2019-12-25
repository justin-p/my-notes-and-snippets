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
			<th>Title</th>
			<th>Description</th>
			<th>Added</th>
			<th>Start time</th>
			<th>Current offer</th>
			<th>Username</th>
			<th>Category id </a> </th>
		</tr>

		
<?php

  $query = "select category.title as category_title ,item.title ,item.description ,item.added ,item.start_time ,item.current_offer, username from item         
   left join category on item.category_id = category.id 
   left join user on item.user_id = user.id";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{
  $item_title = $row["title"];
  $item_description = $row["description"];
  $item_added = $row["added"];
  $item_start_time = $row["start_time"];
  $item_current_offer = $row["current_offer"];
  $item_user_id = $row["username"];
  $item_category_id = $row["category_title"];


  echo 
  "
  <tr> 
  <td>$item_title</td>
  <td>$item_description</td>
  <td>$item_added</td>
  <td>$item_start_time</td>
  <td>$item_current_offer</td>
  <td>$item_user_id</td>
  <td>$item_category_id</td>
  </tr>
  \n";
}
?>


</table>
<?php include 'footer.php' ?>
</div>
</body>
</html>