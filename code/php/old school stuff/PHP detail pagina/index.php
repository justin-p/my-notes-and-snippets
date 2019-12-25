<html>
<body>
  <h1>Schrijvers</h1>
  
  <ul>
<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('library');
  $query = 'select * from author';
  $result = mysql_query($query);
    
  while ($row = mysql_fetch_assoc($result))
  {
?>
<li>
  <a href="author.php?id=<?php echo $row['id'] ?>">
          <?php echo $row['name']?>
  </a>
</li>
<?php
  }
?>  
  </ul>
</body>
</html>
