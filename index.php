<html>
<title>Log ind</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<body>
<?php

?>
<div class="content">
<h2>Log ind og meld dig til klubber</h2>
<h5>Hvis du er ny her, så skriv dit navn og et kodeord, så bliver du oprettet</h5>
<!--Der indtastes navn og kodeord. Dette postes ind i klubOversigt.php. -->
<form action="klubOversigt.php" method="post">
    <h1>Navn:</h1>       <input type="text" name="navn" placeholder="Navn"><br>
    <h1>Password:</h1>   <input type="password" name="password" placeholder="Kode"><br>
    <p>
        <button input type="submit">Opret eller login</button>
    </p>
</form>
    </div>
</body>
</html>