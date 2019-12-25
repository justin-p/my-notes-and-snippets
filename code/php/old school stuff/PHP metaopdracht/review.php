<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('metacritic');
  $query = 
  "
 select * from review left join game on review.game_id = game.id left join developer on game.developer_id = developer.id left join publisher on game.publisher_id = publisher.id left join website on website.id = review.website_id where game_id=$_GET[id]
  ";
  $result = mysql_query($query);
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

<?php $row["name"]?>
<ul class="naam">

</div>
</body>
</html>