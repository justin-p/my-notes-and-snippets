<html>
<body>
<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('library');
  
  $query = "select *
    from book
    where author_id=$_GET[id]";
  $result = mysql_query($query);
  
  while ($row = mysql_fetch_assoc($result))
  {
    echo "<li>$row[title]</li>";
  }
?>
</body>
</html>
