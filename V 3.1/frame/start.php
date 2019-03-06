<?php
//Benutzer einloggen bzw. Session für Benutzer anlegen
session_start();
$_SESSION['userid'] = $_POST['username'];
$_SESSION['position'] = $_POST['position'];
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">
