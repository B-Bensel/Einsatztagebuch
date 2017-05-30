<?php
require_once("../dbcon.php");
$ID = $_POST["ID"];
//Einsatz als nicht aktiv markieren
$neuEL = "UPDATE Einsatz SET Aktiv='0' WHERE ID=$ID";
mysql_query($neuEL);
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">


