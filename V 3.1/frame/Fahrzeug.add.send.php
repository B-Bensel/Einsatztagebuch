<?php
$ID = $_GET["ID"];

$Funkrufname = $_GET["Funkrufname"];
$Fahrzeug = $_GET["Fahrzeug"];

$text = "Das Fahrzeug: " . $Fahrzeug . " - " . $Funkrufname . " wurde dem Einsatz hinzugefügt.";
$user = $_GET["postUsername"];
$Status = 1;

require_once("DB.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Lagemeldungen(Einsatz,username,text,insertDate,Status)
                        VALUES('$ID','$user','$text', CURRENT_TIMESTAMP,'$Status')";

if ($conn->query($sql) === true) {
    echo "Lagemeldung gespeichert.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Fahrzeuge (EinsatzID, Funkrufname, Fahrzeug, Staerke_1, Staerke_2, Staerke_3, PA, Alarmiert, Ausgerueckt, Bereitstellung, EAn, EAb) VALUES ('$ID','".$Funkrufname."', '".$Fahrzeug."', 0, 0, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00')";

if ($conn->query($sql) === true) {
    echo "Fahrzeug hinzugefügt";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<meta http-equiv="refresh" content="0; URL=../ETB.php?ID=<?php echo $ID; ?>">
