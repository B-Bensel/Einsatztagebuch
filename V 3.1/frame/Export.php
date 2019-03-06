<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
    require_once("../index.php");
else :
    $ID = $_GET['ID'];
require_once("DB.php");
?>
<!doctype html>
<html lang="de">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Druckansicht Export</title>
	<link rel="stylesheet" href="../css/export.css">
</head>

<body>
    <button type="button" onclick="javascript:self.print()" class="no-print">Seite drucken</button>
	<button type="button" onclick="window.history.back()" class="no-print">Zurück</button>
    <h1>
        <?php
	// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT Name FROM Einsatz WHERE id = $ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo $row["Name"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </h1>
    <?php
	
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<h4>Fahrzeuge</h4>";

$sql = "SELECT Funkrufname, Fahrzeug, Staerke_1, Staerke_2, Staerke_3, PA, Alarmiert, Ausgerueckt, Bereitstellung, EAn, EAb,(Staerke_1 + Staerke_2 + Staerke_3) AS gStaerke4 FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 1 ORDER BY Funkrufname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Funkrufname</th><th>Fahrzeug</th><th>Stärke</th><th>PA</th><th>Alarmiert</th><th>Ausgerückt</th><th>Bereitstellung</th><th>E an</th><th>E ab</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Funkrufname"] . "</td><td>" . $row["Fahrzeug"] . "</td><td>" . $row["Staerke_1"] . " / " . $row["Staerke_2"] . " / " . $row["Staerke_3"] . "</td><td>" . $row["PA"] . "</td><td>" . date("H:i", strtotime($row["Alarmiert"])) . "</td><td>" . date("H:i", strtotime($row["Ausgerueckt"])) . "</td><td>" . date("H:i", strtotime($row["Bereitstellung"])) . "</td><td>" . date("H:i", strtotime($row["EAn"])) . "</td><td>" . date("H:i", strtotime($row["EAb"])) . "</td></tr>";
		
    }
	
	$sql = "SELECT SUM(Staerke_1) AS gStaerke1, SUM(Staerke_2) AS gStaerke2, SUM(Staerke_3) AS gStaerke3, SUM(PA) AS gPA, (SUM(Staerke_1) + SUM(Staerke_2) + SUM(Staerke_3)) AS gStaerke4 FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 1 LIMIT 1";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
            echo "<tr><td colspan=2></td><td>".$row["gStaerke1"]." / ".$row["gStaerke2"]." / ".$row["gStaerke3"]." / <u>".$row["gStaerke4"]."</u></td><td>".$row["gPA"]."</td><td colspan=5></td></tr></table>";
			}
	
    echo "</table>";
} else {
    echo "Keine Fahrzeuge dem Einsatz zugeteilt.";
}
$conn->close();

echo "<h4>Entfernte Fahrzeuge</h4>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Funkrufname, Fahrzeug, Staerke_1, Staerke_2, Staerke_3, PA, Alarmiert, Ausgerueckt, Bereitstellung, EAn, EAb, (Staerke_1 + Staerke_2 + Staerke_3) AS gStaerke4 FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 0 ORDER BY Funkrufname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Funkrufname</th><th>Fahrzeug</th><th>Stärke</th><th>PA</th><th>Alarmiert</th><th>Ausgerückt</th><th>Bereitstellung</th><th>E an</th><th>E ab</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Funkrufname"] . "</td><td>" . $row["Fahrzeug"] . "</td><td>" . $row["Staerke_1"] . " / " . $row["Staerke_2"] . " / " . $row["Staerke_3"] . "</td><td>" . $row["PA"] . "</td><td>" . date("H:i", strtotime($row["Alarmiert"])) . "</td><td>" . date("H:i", strtotime($row["Ausgerueckt"])) . "</td><td>" . date("H:i", strtotime($row["Bereitstellung"])) . "</td><td>" . date("H:i", strtotime($row["EAn"])) . "</td><td>" . date("H:i", strtotime($row["EAb"])) . "</td></tr>";
    }
	
	$sql = "SELECT SUM(Staerke_1) AS gStaerke1, SUM(Staerke_2) AS gStaerke2, SUM(Staerke_3) AS gStaerke3, SUM(PA) AS gPA, (SUM(Staerke_1) + SUM(Staerke_2) + SUM(Staerke_3)) AS gStaerke4 FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 0 LIMIT 1";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
            echo "<tr><td colspan=2></td><td>".$row["gStaerke1"]." / ".$row["gStaerke2"]." / ".$row["gStaerke3"]." / <u>".$row["gStaerke4"]."</u></td><td>".$row["gPA"]."</td><td colspan=5></td></tr></table>";
			}
	
    echo "</table>";
} else {
    echo "Keine Fahrzeuge dem Einsatz zugeteilt.";
}
$conn->close();

echo "<h4>Einsatztagebuch Einträge</h4>";

	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, text, insertDate FROM Lagemeldungen WHERE Einsatz = $ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . date("d.m.Y H:i", strtotime($row["insertDate"])) . "</td><td>" . $row["username"] . "</td><td>" . $row["text"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Keine Lagemeldungen vorhanden.";
}
$conn->close();

echo "<p>Einsatz exportiert von " .$_SESSION['userid']. " am ".date('d.m.Y')." um ".date('H:i')." Uhr</p>";
?>
</body>

</html>
<?php endif;
?>