<!-- Zeige aktive Einsätze -->
<?php
session_start();
require_once("../dbcon.php");
if ($_SESSION['userid']):
    $getRooms = "SELECT * FROM Einsatz WHERE Aktiv = '1'";
    $roomResults = mysql_query($getRooms);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Export</title>
        <link rel="stylesheet" type="text/css" href="../main.css"/>
	</head>
	<body>
		<div id="page-wrap">
			<div id="header">
            	<div id="you"><span>Tagebuchführer:</span> <?php echo $_SESSION['userid']?></div>
        	</div>
           	<div id="section">
    	        <div id="rooms">
					<h3>Exportübersicht</h3>
					<ul>
						<?php
							while($rooms = mysql_fetch_array($roomResults)):
								$room = $rooms['name'];
						?>
						<li>
							<a href="print.php?ID=<?php echo $rooms['ID']?>"><?php echo $rooms['Name'] ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
        </div>
	</body>
</html>
<?php
	//wenn kein Benutzer eingelogt, zum login weiterleiten
    else:
        echo '<meta http-equiv="refresh" content="0; URL=../index.php">';
    endif;
?>
