<head>
	<title>Tilmeld</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="content">
<?php
    session_start();
    include "database.php";
    $connection = forbindelse();
    tilmeld($connection, $_SESSION['user_id'], $_GET['club_id']);//Funktionen kaldes fra database.php og der indsættes sessionens user_id samt det givne club_id.

    echo "<h1>Du er nu medlem af klubben</h1>";
    echo "<a href='klubOversigt.php'><button>Gå tilbage til oversigten</button></a>";//Knap til at vende tilbage til hovedsiden.
    $tbCreated = $connection->query($sql);

            
?>
    </div>
</body>