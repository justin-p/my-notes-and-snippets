<?php
  session_start();
?>

<html>
<body>
<?php
  // hebben we de zaklamp bij ons?
  if (isset($_SESSION['flashlight']))
  {
    // ja, geef de optie om de zaklamp weg te leggen
    echo '<p>Je hebt een zaklamp bij je.</p>';
    echo '<p><a href="remove_flashlight.php">Leg de zaklamp weg.</a></p>';
  }
  else
  {
    // nee, geef de optie om de zaklamp op te pakken
    echo '<p>Je hebt niets bij je.</p>';
    echo '<p><a href="get_flashlight.php">Pak de zaklamp op.</a></p>';
  }
?>
</body>
</html>
