	<html xmlns="http://www.w3.org/1999/xhtml">
<head><link href="style.css" rel="stylesheet" type="text/css" /> </head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<div id="header"></div>

<div id="navi">
	    <div id="menu" class="default">
	        <ul>
	            <li><a href="index.html">Boeken</a></li>
	            <li><a href="results.php">Vluchten</a></li>
				<li><a href="accounts.php">accounts</a><li>

	        </ul>
	    </div>
	</div>
		<div id="content">
		
		<h1> New Account</h1>
		<form action="insert.php" method="post">
		<p>
		username : <input type="text" name="username" value=""/>
		</p>
		<p>
		password : <input type="password" name="password" value=""/>
		</p>
		<p>
		<input type="submit" value="verstuur" />
		</p>
		</form>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="nagging-menu.js" charset="utf-8"></script>
</body>
</html>