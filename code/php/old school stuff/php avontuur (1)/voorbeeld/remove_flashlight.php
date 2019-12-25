<?php
  session_start();
  
  // onthoud dat we de zaklamp opgepakt hebben
  $_SESSION['flashlight'] = false;
?>

<html>
<body>
  <p>Je legt de zaklamp weg.</p>
  <p><a href="inventory.php">pak de zaklamp op</a></p>
</body>
</html>

