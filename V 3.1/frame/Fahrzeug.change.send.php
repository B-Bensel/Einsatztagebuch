<?php
$ID = $_POST["ID"];
$FID = $_POST["FID"];

$Funkrufname = $_POST["Funkrufname"];
$Fahrzeug = $_POST["Fahrzeug"];

$Staerke_1 = $_POST["Staerke_1"];
$Staerke_2 = $_POST["Staerke_2"];
$Staerke_3 = $_POST["Staerke_3"];
$PA = $_POST["PA"];

$Alarmiert = date("Y-m-d H:i:s", strtotime($_POST["AlarmiertDate"] .' '. $_POST["Alarmiert"]));
$Ausgerueckt = date("Y-m-d H:i:s", strtotime($_POST["AusgeruecktDate"] .' '. $_POST["Ausgerueckt"]));
$Bereitstellung = date("Y-m-d H:i:s", strtotime($_POST["BereitstellungDate"] .' '. $_POST["Bereitstellung"]));
$EAn = date("Y-m-d H:i:s", strtotime($_POST["EAnDate"] .' '. $_POST["EAn"]));
$EAb = date("Y-m-d H:i:s", strtotime($_POST["EAbDate"] .' '. $_POST["EAb"]));

$text = "Das Fahrzeug: " . $Fahrzeug . " - " . $Funkrufname . " ist mit " . $Staerke_1 . "/" . $Staerke_2 . "/" . $Staerke_3 . " (" . $PA . " PA) um " . date('H:i', strtotime($Alarmiert)) . " alarmiert worden, um " . date('H:i', strtotime($Ausgerueckt)) . " ausgerückt, um " . date('H:i', strtotime($Bereitstellung)) . " in Bereitstellung und um " . date('H:i', strtotime($EAn)) . " an der Einsatzstelle eingetroffen und hat um " . date('H:i', strtotime($EAb)) . " die Einsatzstelle verlassen.";
$user = $_POST["postUsername"];
$Status = 1;

require_once("DB.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Lagemeldungen(Einsatz,username,text,insertDate,Status)
                        VALUES('$ID','$user','".$text."', CURRENT_TIMESTAMP,'$Status')";

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

$sql = "UPDATE Fahrzeuge SET Staerke_1 = '$Staerke_1', Staerke_2 = '$Staerke_2', Staerke_3 = '$Staerke_3', PA = '$PA', Alarmiert = '$Alarmiert', Ausgerueckt = '$Ausgerueckt', Bereitstellung = '$Bereitstellung', EAn = '$EAn', EAb = '$EAb' WHERE Fahrzeuge.id = '$FID'";

if ($conn->query($sql) === true) {
    echo "Fahrzeugänderung gespeichert.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<meta http-equiv="refresh" content="0; URL=../ETB.php?ID=<?php echo $ID; ?>">