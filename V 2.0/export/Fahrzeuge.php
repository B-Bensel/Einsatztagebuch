<?php
    session_start();
    require_once("../dbcon.php");

      $ID = $_GET['ID'];
      $reset = mysql_query("SELECT * FROM Einsatz WHERE ID = '$ID'");
	  $row2 = mysql_fetch_array($reset)
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Einsatz: <?php echo $row2['Name']; ?></title>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
</head>
<body id="pb">
<div id="pheader">
                <div id="you"><span>Exportiert von:</span> <?php echo $_SESSION['userid']?>
                </div>
        </div>

    	<div id="psection">

            <h2 id="ph2"><?php echo $row2['Name']; ?></h2>
			<?php
			$result = mysql_query("SELECT * FROM Eintrag WHERE Einsatz_ID = '$ID' ORDER BY Zeit ASC");

			$result = mysql_query("SELECT * FROM Fahrzeuge WHERE Einsatz_ID = '$ID'");

				echo "<div class='Fahrzeug-area'><table id='Fahrzeug-tab2'>";
				echo "<tr>";
				echo "<th>Funkrufname</th>";
				echo "<th>Fahrzeug</th>";
				echo "<th>Stärke</th>";
				echo "<th>PA</th>";
				echo "<th>Alarmiert</th>";
				echo "<th>Ausgerückt</th>";
				echo "<th>Bereitstellung</th>";
				echo "<th>Einsatzstelle an</th>";
				echo "<th>Einsatzstelle ab</th>";
				echo "</tr>";
			while($row = mysql_fetch_array($result))
			{
				$FID = $row['ID'];
				$link2 = '"Status.php?FID='.$FID.'","MyWindow","width=300, height=440"';
				$link = "<a href='#' onClick='MyWindow=window.open(". $link2 . "); return false;'>";



				echo "<tr>";
				echo "<td>" . $row['Funkrufname'] . "</td>";
				echo "<td>" . $row['Fahrzeug'] . "</td>";
				echo "<td>" . $row['Staerke_1'] . " / " . $row['Staerke_2'] . " / " . $row['Staerke_3'] . "</td>";
				echo "<td>" . $row['PA'] . "</td>";
				echo "<td>" . date('H:i', strtotime($row['Alarmiert'])) . "</td>";
				echo "<td>" . date('H:i', strtotime($row['Ausgerueckt'])) . "</td>";
				echo "<td>" . date('H:i', strtotime($row['Bereitstellung'])) . "</td>";
				echo "<td>" . date('H:i', strtotime($row['Einsatzstelle'])) . "</td>";
				echo "<td>" . date('H:i', strtotime($row['EAb'])) . "</td>";
				//echo '<td>'.$link.'bearbeiten</a></td>';
				echo "</tr>";
  }
?>
        </div>
</body>
</html>
