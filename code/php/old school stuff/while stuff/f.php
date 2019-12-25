<?php

$tafel = 1;
while ($tafel <= 20)
	{
		echo "de tafel van" . $tafel . "<br/>";
		$tel= 1;
		while ($tel <=10)
			{
			echo $tel . "x" .$tafel . "=".$tel*$tafel . "<br/>";
			$tel = $tel +1;
			}
         $tafel = $tafel +1;
	}
?>
