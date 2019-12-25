<?php
  session_start();
  

?>
<!DOCTYPE HTML>

<html>

<head>

<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="container">

<img class="start" src="images/forest.jpg">

<p>je in het bos.....................</p>
<p>wat wil je doen?</p>

<ul>
<li><a href="start.php">je loopt naar het noorden.</a></li>

<?php

  if (isset($_SESSION['key']))
  {

  }
  else
  {

    echo '<li><a href="key.php" >je pakt de sleutel op.</a></li>';
  }
?>

</ul>

</div>

</body>

</html>
