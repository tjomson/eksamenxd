<head>
	<title>Frameld</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="content">
<?php
    session_start();
    include "database.php";
    $connection = forbindelse();
    //Der benyttes sessionens user_id og det club_id som blev givet af URL'en.
    frameld($connection, $_SESSION['user_id'], $_GET['club_id']);

    echo "<h1>Du har meldt dig ud af klubben</h1>";
    //Knap til at vende tilbage til hovedsiden.
    echo "<a href='klubOversigt.php'><button>Gå tilbage til oversigten</button></a>";
    $tbCreated = $connection->query($sql);
?>
    </div>
</body>