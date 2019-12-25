<html>
<body>
<?php
if (isset($_GET['id']))
{
  echo '<p>ID: ' . $_GET['id'] . '</p>';
}
if (isset($_GET['name']))
{
  echo '<p>Naam: ' . $_GET['name'] . '</p>';
}

?>

<ul>
  <li>
    <a href="query.php?id=32&name=Spinoza">
      Spinoza
    </a>
  </li>
  
  <li>
    <a href="query.php?id=16&name=Egmond">
      Egmond
    </a>
  </li>
</ul>

</body>
</html>
