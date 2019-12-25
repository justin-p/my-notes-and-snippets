<!DOCTYPE HTML>

<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('metacritic');   
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
		<?php 
		$query =  "select * from game where id = ".$_GET['game_id'];
        $result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
							{
					  $game_id = $row["id"];
					  $game_name = $row["name"];
					  $game_platform = $row["platform"];
					  $game_released = $row["released"];
					  $game_developer_id = $row["developer_id"];
					  $game_publisher = $row["publisher_id"];
					  
					  echo "<h2>$game_name </h2>
					  		<ul class=naam>
							<li>Platform : $game_platform </li>
							\n" ;
					  }
					  
		?>
		
		<?php 
		$query =  "select * from publisher where id = ".$_GET['game_id'];
        $result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
		{
		$pub_name = $row["name"];
		}
		
		echo 
		"
		<li>Publisher : $pub_name</li>
		\n"; 
		?>
		
		<?php 
		$query =  "select * from developer where id = ".$_GET['game_id'];
        $result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
		{
		$dev_name = $row["name"];
		}
		
		echo 
		"
		<li>Developer : $dev_name</li>
		\n"; 
		?>
		
		<?php 
		$query =  "select * from website where id = ".$_GET['website_id'];
        $result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
		{
		$web_name = $row["name"];
		}
		
		echo 
		"
		<li>Reviews by website: $web_name</li>
		\n"; 
		?>
		</ul>

		<ul>
		<?php
		$query =  "select * from review where game_id = ".$_GET["game_id"]. " and website_id = " . $_GET["website_id"];
        $result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
		{
		$rev_grade = $row["grade"];
		$rev_des = $row["description"];
		$rev_url = $row["url"];
		
		echo "<li> $rev_grade</li>
			  <li> 	$rev_des </li>
			  <li><a href=$rev_url>lees meer</a> </li>
			  \n";
			  }

		?>
		
		
</ul>
		<hr>
	</div>
</body>
</html>

