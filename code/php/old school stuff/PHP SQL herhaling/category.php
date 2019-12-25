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
		</tr>

		
<?php

  $query = "select * from category";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{
  $category_title = $row["title"];
  echo 
  "
  <tr> 
  <td>$category_title</td>
  </tr>
  \n";
}
?>


</table>
<?php include 'footer.php' ?>
</div>
</body>
</html>