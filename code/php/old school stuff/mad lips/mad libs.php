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
	
							<h1> Er heerst paniek </h1>
	
				<form method="post" action="mood.php">
							
							<p>
								<label>Welk dier zou je nooit als huisdier willen hebben ?</label>
								<input type="text" name="dier" />
							</p>
    
							
							<p>
								<label>Wie is de belangrijkste persoon in je leven ?</label>
								<input type="text" name="persoon" />
							</p>
							
							
							<p>
								<label>In welk land zou jij graag willen wonen ?</label>
								<input type="text" name="land" />
							</p>    
							
							
							<p>
								<label>Wat doet je als je je verveelt ?</label>
								<input type="text" name="verveel" />
							</p>
							
							
							<p>
								<label>Met welk speelgoed speelde je als kind het meest ?</label>
								<input type="text" name="speelgoed" />
							</p>
							
							
							<p>
								<label>Bij welke docent spijbel je het liefst ?</label>
								<input type="text" name="spijbel" />
							</p>
							
							
							<p>
								<label>Als je €100,000 had, wat jou je dan kopen ?</label>
								<input type="text" name="euro" />
							</p>
							
							
							<p>
								<label>Wat is je favoriete bezigheid ?</label>
								<input type="text" name="bezig" />
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
