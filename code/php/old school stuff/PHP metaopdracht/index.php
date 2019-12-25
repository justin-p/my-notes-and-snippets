<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
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
  
  <ul>
<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('metacritic');
  $query = 'select * from game';
  $result = mysql_query($query);
    
  while ($row = mysql_fetch_assoc($result))
  {
?>
<li>
  <a href="review.php?id=<?php echo $row['id'] ?>">
          <?php echo $row['name']?>
  </a>
</li>
<?php
  }
?>  
  </ul>
</body>
</html>