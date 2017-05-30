<?php

    session_start();

	//DB Verbindung herstellen
    require_once("dbcon.php");

	//Inhalt nur bei akivem Login zeigen
    if ($_SESSION['userid']): 	  

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Übersicht</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="page-wrap">
    	<div id="header">
			<h1><a href="index.php">Einsatztagebuch</a></h1>
        	<div id="you">
				<span>Tagebuchf&uuml;hrer:</span> <?php echo $_SESSION['userid']?></br>
				<a href="logout.php">wechseln</a>
			</div>
        </div>
        <div id="section">
    	    <div id="rooms">
            	<h3>Einsatzübersicht</h3>
                <ul>
                    <?php
						//Einsatzübersicht ausgeben
						$Einsatz = "SELECT * FROM Einsatz WHERE Aktiv = '1'";
						$Ubersicht = mysql_query($Einsatz);

						while($rooms = mysql_fetch_array($Ubersicht)):
                        $room = $rooms['Name'];
                    ?>
						<li>
							<a href="room/?ID=<?php echo $rooms['ID']?>"><?php echo $rooms['Name'] ?></a>
						</li>
                    <?php endwhile; ?>
					<!-- neuen Einsatz anlegen -->
					<li id="add">
						<form action="add.php" method="post">
							Einsatzbeschreibung: <input type="text" name="EB" />
							<input type="Submit" value="neues Einsatzprotokoll erstellen" />
						</form>
					</li>
					<!-- Einsatz exportieren und löschen -->
					<li id="add"><a href="export">Exportieren</a></li>
                </ul>
            </div>
        </div>
	</div>
</body>
</html>
<?php
	endif;
?>
