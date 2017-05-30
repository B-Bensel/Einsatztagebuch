<?php
session_start();
require_once("../dbcon.php");

$heute = date("Y-m-d");   
//Daten übernehmen
$Funkrufname = $_POST["Funkrufname"];
$Fahrzeug = $_POST["Fahrzeug"];
$Staerke_1 = $_POST["Staerke_1"];
$Staerke_2 = $_POST["Staerke_2"];
$Staerke_3 = $_POST["Staerke_3"];
$PA = $_POST["PA"];
$Alarmiert = $heute ." ". $_POST["Alarmiert"] .":00";
$Ausgerueckt  = $heute ." ". $_POST["Ausgerueckt"] .":00";
$Bereitstellung = $heute ." ". $_POST["Bereitstellung"] .":00";
$Einsatzstelle = $heute ." ". $_POST["Einsatzstelle"] .":00";
$EAb = $heute ." ". $_POST["EAb"] .":00";
$Landkreis = $_POST["Landkreis"];
$Gemeinde = $_POST["Gemeinde"];
$Ortsteil = $_POST["Ortsteil"];
$ID = $_POST["ID"];
//Fahrzeug in Fahrzeugübersicht einfügen
$neuFZ = "INSERT INTO Fahrzeuge (`ID`, `Einsatz_ID`, `Funkrufname`, `Fahrzeug`, `Staerke_1`, `Staerke_2`, `Staerke_3`, `PA`, `Alarmiert`, `Ausgerueckt`, `Bereitstellung`, `Einsatzstelle`, `EAb`, `Landkreis`, `Gemeinde`, `Ortsteil`) VALUES (NULL, '$ID', '$Funkrufname', '$Fahrzeug', '$Staerke_1', '$Staerke_2', '$Staerke_3', '$PA', '$Alarmiert', '$Ausgerueckt', '$Bereitstellung', '$Einsatzstelle', '$EAb', '$Landkreis', '$Gemeinde', '$Ortsteil');";
mysql_query($neuFZ);
//Tagebucheintrag erstellen
$username = $_SESSION['userid'];
$ddd = "Das Fahrzeug: " .$Fahrzeug. " - " . $Funkrufname . " ist mit " .$Staerke_1 ."/". $Staerke_2 ."/". $Staerke_3. " (" .$PA. " PA) um" .date('H:i', strtotime($Alarmiert)). " alarmiert worden, um" .date('H:i', strtotime($Ausgerueckt)). " ausgerückt, um " .date('H:i', strtotime($Bereitstellung)). " in Bereitstellung und um " .date('H:i', strtotime($Einsatzstelle)). " an der Einsatzstelle eingetroffen und hat um " .date('H:i', strtotime($EAb)). " die Einsatzstelle verlassen.";
$query = "INSERT INTO Eintrag (Einsatz_ID, Username, Eintragtext) VALUES ('$ID', '$username', '$ddd')";
mysql_query($query);

?>
<meta http-equiv="refresh" content="0; URL=Fahrzeugadd.php?ID=<?php echo $ID; ?>">