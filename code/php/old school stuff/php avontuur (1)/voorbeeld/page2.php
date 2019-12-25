<?php
  session_start();
?>

<html>
<body>
<?php
  if (isset($_SESSION["page2"]))
  {
    $_SESSION["page2"]++;
  }
  else
  {
    $_SESSION["page2"] = 1;
  }
?>

  <p>Je bent <?php echo $_SESSION["page2"]; ?> keer op deze pagina geweest.</p>
  <p>Je bent <?php echo $_SESSION["page1"]; ?> keer op de andere pagina geweest.</p>
  <p><a href="page1.php">Klik hier om naar een andere pagina te gaan.</a></p>
</body>
</html>
