<?php

require_once("DB.php");
 
 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Funkrufname = $_GET["Funkrufname"];
$Fahrzeug = $_GET["Fahrzeug"];
$Org = $_GET["Org"];
$Standort = $_GET["Standort"];

if (empty($_GET["Erstauswahl"])) {
    $Erstauswahl = 0;
} else {
    $Erstauswahl = 1;
}


$sql = "INSERT INTO Fahrzeugvorlage (Funkrufname, Fahrzeug, Funktion, Ort, Erstauswahl)
 VALUES ('$Funkrufname', '$Fahrzeug', '$Org', '$Standort', '$Erstauswahl')";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">
