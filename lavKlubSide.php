<html>
<head>
	<title>Opret klub</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
	<body>
		<div class="content">
		<!--Værdierne postes ind i lavKlub.php -->
		<form action="lavKlub.php" method="post">
    	<h1>Klubbens navn:</h1>       <input type="text" name="navn"><br>
    	<h1>Beskrivelse af klubben</h1>   <input type="text" name="beskrivelse"><br>
    	<p><!--p benyttes til at rykke knappen lidt længere ned.-->
    	<button input type="submit">Opret klub</button>
    	</p>
		</form>
    	</div>
	</body>
</html>