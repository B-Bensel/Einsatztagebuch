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
    <title>Druckansicht Fahrzeugübersicht</title>
</head>

<body>
    <button type="button" onclick="javascript:self.print()">Seite drucken</button>
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

$sql = "SELECT Funkrufname, Fahrzeug, Staerke_1, Staerke_2, Staerke_3, PA, Alarmiert, Ausgerueckt, Bereitstellung, EAn, EAb FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><tr><th>Funkrufname</th><th>Fahrzeug</th><th>Stärke</th><th>PA</th><th>Alarmiert</th><th>Ausgerückt</th><th>Bereitstellung</th><th>E an</th><th>E ab</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Funkrufname"] . "</td><td>" . $row["Fahrzeug"] . "</td><td>" . $row["Staerke_1"] . " / " . $row["Staerke_2"] . " / " . $row["Staerke_3"] . "</td><td>" . $row["PA"] . "</td><td>" . date("H:i", strtotime($row["Alarmiert"])) . "</td><td>" . date("H:i", strtotime($row["Ausgerueckt"])) . "</td><td>" . date("H:i", strtotime($row["Bereitstellung"])) . "</td><td>" . date("H:i", strtotime($row["EAn"])) . "</td><td>" . date("H:i", strtotime($row["EAb"])) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>

</html>
<?php endif;
?>
