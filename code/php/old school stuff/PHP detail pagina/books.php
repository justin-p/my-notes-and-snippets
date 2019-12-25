<html>
<body>
  <h1>Boeken</h1>
  
<?php
  mysql_connect('localhost', 'root');
  mysql_select_db('library');
  
  $query = 'select book.title as book, author.name as author
    from book
    left join author on book.author_id = author.id';
  $result = mysql_query($query);
  
  while ($row = mysql_fetch_assoc($result))
  {
    echo "<li>$row[book] ($row[author])</li>";
  }
?>
</body>
</html>
