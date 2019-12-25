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
			<th>Sender</th>
			<th>Reciever</th>
			<th>Message</th>

		</tr>

		
<?php

  $query = "select * from communication";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{
  $Communication_sender = $row["sender"];
  $Communication_reciever = $row["reciever"];
  $Communication_message = $row["message"];



  echo 
  "
  <tr> 
  <td>$Communication_sender</td>
  <td>$Communication_reciever</td>
  <td>$Communication_message</td>

  </tr>
  \n";
}
?>


</table>
<?php include 'footer.php' ?>
</div>
</body>
</html>