<?php

session_start();

require_once("DB.php");
 
 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Name = date("d.m.Y") . " - " . $_GET['Einsatz'];
$sql = "INSERT INTO Einsatz (Name, Aktiv)
 VALUES ('$Name', 1)";

if ($conn->query($sql) === true) {
    echo "Einsatz wurde angelegt";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//EinsatzID bekommen

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id FROM Einsatz WHERE Name = '$Name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $ID = $row["id"];
    }
} else {
    echo "0 results";
}
$conn->close();


// Fahrzeug aus Erstauswahl hinzufügen
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Funkrufname, Fahrzeug FROM Fahrzeugvorlage WHERE Erstauswahl = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

$sql2 = "INSERT INTO Fahrzeuge (EinsatzID, Funkrufname, Fahrzeug, Staerke_1, Staerke_2, Staerke_3, PA, Alarmiert, Ausgerueckt, Bereitstellung, EAn, EAb) VALUES ('$ID', '".$row["Funkrufname"]."', '".$row["Fahrzeug"]."', 0, 0, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00')";

if ($conn2->query($sql2) === TRUE) {
    echo "Fahrzeug eingefügt";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn2->error;
}


$conn2->close();
		
    }
} else {
    echo "Noch keine Fahrzeuge in Erstauswahl.";
}
$conn->close();

//Meldung Einsatz angelegt.

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_errot) {
	die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO Lagemeldungen(Einsatz,username,text,insertDate,Status) VALUES('$ID','".$_SESSION['userid']."','Der Einsatz wurde um ".date("H:i")." Uhr von ".$_SESSION['userid']." angelegt.',CURRENT_TIMESTAMP,1)";
if($conn->query($sql) === TRUE) {
	echo "Einsatzbeginn dokumentiert.";
} else {
	echo "Error: ". $sql . "<br>" . $conn->error;
}
$conn->close;

?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">
