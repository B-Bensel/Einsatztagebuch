<?php
$ID =$_POST['ID'];
session_start();

require_once("../dbcon.php");

$ddd=$_POST['message'];
$username=$_SESSION['userid'];

$query = "INSERT INTO Eintrag (Einsatz_ID, Username, Eintragtext) VALUES ('$ID', '$username', '$ddd')";
mysql_query($query);
?>
<head>
<meta http-equiv="refresh" content="0; URL=index.php?ID=<?php echo $ID;?>">
</head>
<a href="index.php?ID=<?php echo $ID;?>">Hier klicken, falls nicht automatisch weitergeleitet wird.</a>