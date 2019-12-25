<?php
  session_start();
  
  // onthoud dat we de zaklamp opgepakt hebben
  $_SESSION['flashlight'] = true;
?>

<html>
<body>
  <p>Je pakt de zaklamp op.</p>
  <p><a href="inventory.php">Terug</a></p>
</body>
</html>

