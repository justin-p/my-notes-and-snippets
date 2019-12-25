<!DOCTYPE HTML>


<html>

<head>
  <title>Mad Libs</title>
  <link href="mad libs.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="center"> 

<?php include 'menu.php'; ?>
	
	
	
	
	     <div class="form">
	
							<h1> Onkunde </h1>
	
				<form method="post" action="mood2.php">
							
							<p>
								<label>Wat zou je graag willen kunnen ?</label>
								<input type="text" name="kunnen" />
							</p>
    
							
							<p>
								<label>Met welke persoon kun je het best opschieten ?</label>
								<input type="text" name="persoon" />
							</p>
							
							
							<p>
								<label>Wat is je favorite getal ?</label>
								<input type="text" name="getal" />
							</p>    
							
							
							<p>
								<label>Wat heb je altijd bij je als je op vakantie gaat ?</label>
								<input type="text" name="vakanties" />
							</p>
							
							
							<p>
								<label>Wat is je beste persoonlijke eigenschap ?</label>
								<input type="text" name="beste" />
							</p>
							
							
							<p>
								<label>Wat is je slechste persoonlijke eigenschap ?</label>
								<input type="text" name="slecht" />
							</p>
							
							
							<p>
								<label>Wat is het ergste wat je kan overkomen ?</label>
								<input type="text" name="overkomen" />
							</p>
			
							
							<p>   
							    <label>&nbsp;</label>
								<input type="submit" value="Versturen" />
							</p>

				</form>
  


         </div>
		 
<?php include 'footer.php'; ?>

</div>

</body>

</html>
