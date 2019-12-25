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
			<th>Username</th>
			<th>Password</th>
			<th>Full Name</th>
			<th>Address</th>
			<th>City</th>
			<th>zipcode</th>
			<th>E-mail address</th>
			<th>Phone</th>
		</tr>

		
<?php

  $query = "select * from user";
  
  $result = mysql_query($query);

while ($row = mysql_fetch_assoc($result))
{

  $user_username = $row["username"];
  $user_password = $row["password"];
  $user_full_name = $row["full_name"];
  $user_address = $row["address"];
  $user_city = $row["city"];
  $user_zipcode = $row["zipcode"];
  $user_emailaddress = $row["emailaddress"];
  $user_phone = $row["phone"];



  echo 
  "
  <tr> 
  <td>$user_username</td>
  <td>$user_password</td>
  <td>$user_full_name</td>
  <td>$user_address</td>
  <td>$user_city</td>
  <td>$user_zipcode</td>
  <td>$user_emailaddress</td>
  <td>$user_phone</td>
  </tr>
  \n";
}
?>


</table>
<?php include 'footer.php' ?>
</div>
</body>
</html>