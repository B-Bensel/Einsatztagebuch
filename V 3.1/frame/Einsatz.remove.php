<?php
require_once("DB.php");

$ID = $_GET["ID"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Einsatz SET Aktiv = 0 WHERE id = '$ID'";

if ($conn->query($sql) === TRUE) {
    echo "Einsatz wurde archiviert.";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">