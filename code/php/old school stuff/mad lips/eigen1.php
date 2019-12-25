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
	
							<h1> Lover </h1>
	
				<form method="post" action="mood3.php">
							
							<p>
								<label>noem een getal van 1 tot 31</label>
								<input type="text" name="getal" />
							</p>
    
							
							<p>
								<label>Wat is je liefelings maand ?</label>
								<input type="text" name="maand" />
							</p>
							
							
							<p>
								<label>Wat is je favorite land ?</label>
								<input type="text" name="land" />
							</p>    
							
							
							<p>
								<label>Wat is je liefde van je leven ?</label>
								<input type="text" name="lover" />
							</p>

			                <p>
								<label>Wat doe je het liefst met je liefde ?</label>
								<input type="text" name="bezigheid" />
							</p>
							
			                <p>
								<label>Wat wil je totaal niet doen met je liefde?</label>
								<input type="text" name="bezigheid2" />
							</p>	
							
			                <p>
								<label>Waar doe je dat het liefst?</label>
								<input type="text" name="plek" />
							</p>
							
			                <p>
								<label>Wat is je liefelings lichaamsdeel ?</label>
								<input type="text" name="lichaamsdeel" />
							</p>
							
			                <p>
								<label>Waar wil niet worden aangeraakt ?</label>
								<input type="text" name="lichaamsdeel2" />
							</p>
							
							<p>
								<label>Waar wil je liefde niet aanraken ?</label>
								<input type="text" name="lichaamsdeel3" />
							</p>
							
							<p>
								<label>Wat wil je dat je liefde doet met jou ?</label>
								<input type="text" name="doen" />
							</p>	
							
							<p>
								<label>Welk persoon haat je het meest ?</label>
								<input type="text" name="haat" />
							</p>
												
							<p>
								<label>Wat is het beste moord wapen ?</label>
								<input type="text" name="voorwerp" />
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
