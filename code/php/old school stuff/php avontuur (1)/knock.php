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

<img class="start" src="images/knock.jpg">

<p>je staat voor de deur.....................</p>
<p>wat wil je doen?</p>
<?php
  if (isset($_SESSION['key']))
  {
    echo '<li><a href="open.php" >je maakt de deur open.</a></li>';
  }
  else
  {


  }
  ?>
<ul>
<li><a href="bos.php" >je loopt naar het zuiden.</a></li>
</ul>

</div>

</body>

</html>
