<?php
//Benutzer einloggen bzw. Session für Benutzer anlegen
session_start();
session_unset();
session_destroy();
$_SESSION = array();
?>
<!-- Zu Übersicht weiterleiten -->
<meta http-equiv="refresh" content="0; URL=../index.php">
