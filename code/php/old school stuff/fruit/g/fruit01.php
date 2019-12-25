<p> i can count to </p>

<?php
$fruit = $_GET['fruit']; 

for ($i = 1; $i <= count($fruit); $i++)
{
			$stra = strpos($fruit[$i],'a');
			$strb = strpos($fruit[$i],'p');

			if( $stra === 0)
			{
			echo $fruit[$i]."<br/>";;
			}

			else if ($strb === 0)

			{
			echo $fruit[$i]."<br/>";;
			}

			}


?>