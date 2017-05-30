<?php
$now= date("m.d.Y H:i");
require_once("../dbcon.php");

$EL = $_POST["Einsatzleiter"];
$ID = $_POST["ID"];
$nickname = $_POST["nickname"];


$neuEL = "UPDATE Einsatz SET Einsatzleiter = '$EL' WHERE ID ='$ID'";
mysql_query($neuEL);

$neuEL = "INSERT INTO Eintrag (Einsatz_ID, Username, Eintragtext) VALUES ('$ID', '$nickname', 'Der Einsatzleiter ist jetzt $EL')";
mysql_query($neuEL);

?>
<meta http-equiv="refresh" content="0; URL=index.php?ID=<?php echo $ID; ?>">
