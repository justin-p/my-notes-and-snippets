<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<div id="header"></div>
<div id="content">
<form action="update.php" method="post">

<?php
include_once 'database.php';

if (isset($_POST['postback']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
}
else
{
  $id = $_GET['id'];
  $query = "select * from contact where id=$id";
  $result = mysql_query($query);
  $row = mysql_fetch_assoc($result);
  
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $address = $row['address'];
}
?>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<p>
<label> name: <label> <input type="text" name="name" value="<?php echo $row ['name']; ?>" />
</p>
<p>
<label> e-mail<label><input type="text" name="email" value="<?php echo $row ['email']; ?>" />
</p>
<p>
<label> phone:<label><input type="text" name="phone" value="<?php echo $row ['phone']; ?>" />
</p>
<p>
<label> address:<label><textarea  type="text" name="address" value="<?php echo $row ['address']; ?>"> </textarea>
</p>
 
<p>
<input type="submit" value="verstuur" />
</p>
</form>
</div>
</body>
</html>