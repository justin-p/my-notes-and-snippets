<?php
  session_start();
  
  // onthoud dat we de sleutel opgepakt hebben
  $_SESSION['key'] = true;
?>
<!DOCTYPE HTML>

<html>

<head>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="container">

<img class="start" src="images/key.jpg">
<p>je staat voor een door</p>
<p>wat wil je doen?</p>
<ul>





<li><a href="start.php">je loopt naar het noorden.</a></li>
</ul>

</div>

</body>

</html>
