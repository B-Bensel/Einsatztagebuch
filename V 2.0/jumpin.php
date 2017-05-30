<?php
//Benutzer einloggen bzw. Session für Benutzer anlegen
session_start();
require_once("dbcon.php");
$username           = $_POST['userid'];
$_SESSION['userid'] = $username;
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=index.php">
