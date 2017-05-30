<?php
    session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
    if (!isset($_SESSION['userid']))    :
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Einsatztagebuch</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="page-wrap">
    	<div id="header">
        	<h1><a href="index.php">Einsatztagebuch</a></h1>
        </div>
    	<div id="section">
        	<form method="post" action="jumpin.php" name="username">
            	<label>Benutzername wählen:</label>
                <div>
                	<input type="text" id="userid" name="userid" autofocus />
                    <input type="submit" value="einloggen" id="jumpin"/>
            	</div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
	//wenn Benutzer eingelogt, zeige Übersicht
    else                                :
        require_once("chatrooms.php");
    endif;
?>
