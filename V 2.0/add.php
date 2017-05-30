<?php
//DB Verbindung herstellen
require_once("dbcon.php");

//Daten übernehmen und generieren
$EB = $_POST["EB"];
$now = date("d.m.Y");
$name = (($now).' - '.($EB));

//Einsatz in DB anlegen
$neuEinsatz = "INSERT INTO Einsatz (Name, Aktiv) VALUES ('$name', '1')";
mysql_query($neuEinsatz);

//Einsatz ID abfragen
$EinsatzID = "SELECT ID FROM Einsatz WHERE Name='$name'";
$result = mysql_query($EinsatzID);
$row = mysql_fetch_array($result);
$ID = $row['ID'];

//Standardfahrzeuge aus DB suchen
$Vorlage = "SELECT * FROM Fahrzeugvorlage WHERE Erstauswahl=1";
$Standardfahrzeuge = mysql_query($Vorlage);

//Standardfahrzeuge dem Einsatz hinzufügen
while($Line = mysql_fetch_array($Standardfahrzeuge))
  {
	$Funkrufname = $Line['Funkrufname'];
	$Fahrzeug = $Line['Fahrzeug'];
	$Landkreis = $Line['Landkreis'];
	$Gemeinde = $Line['Gemeinde'];
	$Ortsteil = $Line['Ortsteil'];
	if ($Funkrufname=='Florian Langgöns 01' OR $Funkrufname=='Florian Langgöns 02') {
		$Staerke_1=1;
	} else {
		$Staerke_1=0;
	}
	$Fahrzeuge = "INSERT INTO Fahrzeuge (Einsatz_ID, Funkrufname, Fahrzeug, Staerke_1, Landkreis, Gemeinde, Ortsteil, Alarmiert, Ausgerueckt, Bereitstellung, Einsatzstelle, EAb) VALUES ('$ID', '$Funkrufname', '$Fahrzeug', '$Staerke_1', '$Landkreis', '$Gemeinde', '$Ortsteil', '2017-01-01 00:00:00', '2017-01-01 00:00:00', '2017-01-01 00:00:00', '2017-01-01 00:00:00', '2017-01-01 00:00:00')";
	mysql_query($Fahrzeuge);
  };

?>
<!-- Zu Einsatz weiterleiten -->
<meta http-equiv="refresh" content="0; URL=room/?ID=<?php echo $ID; ?>">