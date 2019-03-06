<?php

require_once("DB.php");
 
 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Landkreis = $_GET["Landkreis"];
$Gemeinde = $_GET["Gemeinde"];
$Ortsteil = $_GET["Ortsteil"];


$sql = "INSERT INTO Orte (Landkreis, Gemeinde, Ortsteil)
 VALUES ('$Landkreis', '$Gemeinde', '$Ortsteil')";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">
