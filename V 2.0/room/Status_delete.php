<?php
session_start();
require_once("../dbcon.php");

$heute = date("Y-m-d");   

$FID = $_POST["FID"];

$query = "DELETE FROM Fahrzeuge WHERE ID = '$FID'";
mysql_query($query);

?>	
 