<?php
  session_start();
?>


<html>
<body>
  
  <?php
  // zijn we al eerder op deze pagina geweest?
  if (isset($_SESSION["page1"]))
  {
    // ja, verhoog het aantal bezoeken met 1
    $_SESSION["page1"]++;
  }
  else
  {
    // nee, onthoud dit als ons eerst bezoek
    $_SESSION["page1"] = 1;
  }
?>
<p>Je bent <?php echo $_SESSION["page1"]; ?> keer op deze pagina geweest.</p>
</body>
</html>
