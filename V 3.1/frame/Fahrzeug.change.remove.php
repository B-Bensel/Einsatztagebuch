<?php
$FID = $_POST["FID"];
$user = $_POST["postUsername"];
$Fahrzeug = $_POST["Fahrzeug"];
$ID = $_POST["ID"];
$Funkrufname = $_POST["Funkrufname"];

$text = "Das Fahrzeug: " . $Fahrzeug . " - " . $Funkrufname . " wurde von ".$user." aus dem Einsatz entfernt.";

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

$sql = "UPDATE Fahrzeuge SET aktiv = 0 WHERE Fahrzeuge.id = '$FID'";

if ($conn->query($sql) === true) {
    echo "Fahrzeug wurde entfernt.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<meta http-equiv="refresh" content="0; URL=../ETB.php?ID=<?php echo $ID; ?>">
