De mode optie nog doen en ASC DESC ordening

<html>

<head>

<?php
  $connection = mysql_connect('localhost', 'root');
	
  mysql_select_db('people');
?>
  
<link href="style.css" rel="stylesheet" type="text/css" />

</head>


<body>

<div class="container">
<div class="persoon"> 
<h1> Personen </h1>

<table>



<p> <a href="index.php?mode=lijst"> lijst </a> </p>
<p> <a href="index.php?mode=tabel"> tabel </a> </p>


				<?php
				$soort=$_GET['sort'];
								
				if ($soort =="name")
				{
				$sorteer= "name";
				}
				else
				{
				$sorteer= "date_of_birth";
				}
				
				$sort = $_GET['mode']; 
				
				if ($sort == "tabel")
				
						$query =  "select * from person order by $sorteer";
				  echo $query;
				  
                  $result = mysql_query($query);
				  while ($row = mysql_fetch_assoc($result))
					{
					
			$person_name= $row["name"];
			$person_date= $row["date_of_birth"];
					 echo 
					  "
					  <tr> 
					  <td> <a > $person_name </a> </td>
					  
					  <td> ($person_date) </td>
					  </tr>
					  \n";
					  }			
				
				
                $orderr=$_GET['order'];			
				if ($orderr =="desc")
				{
				$volgorde="desc";
				}
				else
				{
				$volgorde="asc";
				}
				
		
				
				

					?>
					
				</table>
				
				<p> <a href="index.php?sort=name&order=desc">sorteer op naam</a> </p>
				<p> <a href="index.php?sort=date&order=desc">sorteer op datum</a> </p>
					</div>
<div class="footer"> <p > Deze pagina is gemaakt door Justin.</p> </div>
</div>

</body>
</html>