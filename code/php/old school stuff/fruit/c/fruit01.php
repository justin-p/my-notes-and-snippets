
<?php
$getal = $_GET['getal'];

for ($i = 1; $i <= 5; $i++) 
    {
	 $getal[$i]++;
    }
for ($i = 1; $i <= 5; $i++) 
    {
    
	echo $getal[$i] ."<br/>	";
	}
?>