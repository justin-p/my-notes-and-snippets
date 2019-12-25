<!DOCTYPE HTML>
<html>

<head>
	<title> Onkunde </title>
    <link href="mad libs.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="center"> 

<?php include 'menu.php'; ?>
	
		  <div class="form">
  	
				    <h1> Onkunde </h1>
					<p>Er zijn veel mensen die niet kunnen <?php echo $_POST["kunnen"]; ?>.
					Neem nou <?php echo $_POST["persoon"]; ?>.
					Zelfs met de hulp van een <?php echo $_POST["vakantie"]; ?> of zelfs <?php echo $_POST["getal"]; ?> kan <?php echo $_POST["persoon"]; ?> niet <?php echo $_POST["kunnen"]; ?>.
					Dat heeft niet te maken met een gebrek aan <?php echo $_POST["beste"]; ?>, maar met een te veel aan <?php echo $_POST["slecht"]; ?>.
					Te veel <?php echo $_POST["slecht"]; ?> leidt tot <?php echo $_POST["overkomen"]; ?> en dat is niet goed als je wilt <?php echo $_POST["beste"]; ?>.
					Helaas voor <?php echo $_POST["persoon"]; ?>.</p>

             </div>   
    
<?php include 'footer.php'; ?>

</div>


</body>
</html>
