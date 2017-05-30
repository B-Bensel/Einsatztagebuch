<?php
session_start();
require_once("../dbcon.php");

$heute = date("Y-m-d");   

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
$FID = $_POST["FID"];

$neuFZ = "UPDATE Fahrzeuge SET Staerke_1='$Staerke_1', Staerke_2='$Staerke_2', Staerke_3='$Staerke_3', PA='$PA', Alarmiert='$Alarmiert', Ausgerueckt='$Ausgerueckt', Bereitstellung='$Bereitstellung', Einsatzstelle='$Einsatzstelle', EAb='$EAb', Landkreis='$Landkreis', Gemeinde='$Gemeinde', Ortsteil='$Ortsteil'  WHERE `ID`='$FID' ";
mysql_query($neuFZ);

$username = $_SESSION['userid'];
$EID = $_POST['EID'];
$ddd = "Das Fahrzeug: " .$Fahrzeug. " - " . $Funkrufname . " ist mit " .$Staerke_1 ."/". $Staerke_2 ."/". $Staerke_3. " (" .$PA. " PA) um " .date('H:i', strtotime($Alarmiert)). " alarmiert worden, um " .date('H:i', strtotime($Ausgerueckt)). " ausgerückt, um " .date('H:i', strtotime($Bereitstellung)). " in Bereitstellung und um " .date('H:i', strtotime($Einsatzstelle)). " an der Einsatzstelle eingetroffen und hat um " .date('H:i', strtotime($EAb)). " die Einsatzstelle verlassen.";

$query = "INSERT INTO Eintrag (Einsatz_ID, Username, Eintragtext) VALUES ('$EID', '$username', '$ddd')";
mysql_query($query);

?>
<meta http-equiv="refresh" content="0; URL=Status.php?FID=<?php echo $FID; ?>">