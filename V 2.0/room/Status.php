<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Fahrzeug &auml;ndern</title>
  </head>
  <body>
<?php
require_once("../dbcon.php");
	$FID=$_GET['FID'];
	$result = mysql_query("SELECT * FROM Fahrzeuge WHERE ID = '$FID'");
	$row = mysql_fetch_array($result);
?>
<h2>Fahrzeug &auml;ndern</h2>
<form action="Status_delete.php" method="post"><input type="hidden" value="<?php echo $FID; ?>" name="FID"><input type="submit" value="Fahrzeug aus Einsatz löschen"></form>
<table><form action="Status_update.php" method="post">
<tr><th>Funkrufname</th><td><?php echo $row['Funkrufname']; ?></td></tr>
<tr><th>Fahrzeug</th><td><?php echo $row['Fahrzeug']; ?></td></tr>
<tr><th>St&auml;rke</th><td><input type="text" name="Staerke_1" size="3" value="<?php echo $row['Staerke_1'].'"> / <input type="text" name="Staerke_2" size="3" value="'.$row['Staerke_2'].'"> / <input type="text" name="Staerke_3" size="3" value="'.$row['Staerke_3']; ?>"></td></tr>
<tr><th>PA</th><td><input type="text" name="PA" size="3" value="<?php echo $row['PA'];?>"></td></tr>
<tr><th>Alarmiert</th><td><input onclick="myFunction1()" id="Alarmiert" type="time" name="Alarmiert" size="22" value="<?php echo date('H:i', strtotime($row['Alarmiert']));?>"></td></tr>
<tr><th>Ausger&uuml;ckt</th><td><input onclick="myFunction2()" id="Ausgerueckt" type="time" name="Ausgerueckt" size="22" value="<?php echo date('H:i', strtotime($row['Ausgerueckt']));?>"></td></tr>
<tr><th>Bereitstellung</th><td><input onclick="myFunction3()" id="Bereitstellung" type="time" name="Bereitstellung" size="22" value="<?php echo date('H:i', strtotime($row['Bereitstellung']));?>"></td></tr>
<tr><th>Einsatzstelle an</th><td><input onclick="myFunction4()" id="Einsatzstelle" type="time" name="Einsatzstelle" size="22" value="<?php echo date('H:i', strtotime($row['Einsatzstelle']));?>"></td></tr>
<tr><th>Einsatzstelle ab</th><td><input onclick="myFunction5()" id="EAb" type="time" name="EAb" size="22" value="<?php echo date('H:i', strtotime($row['EAb']));?>"></td></tr>
<tr><th>Landkreis</th><td><input type="text" name="Landkreis" size="22" value="<?php echo $row['Landkreis'];?>"></td></tr>
<tr><th>Gemeinde</th><td><input type="text" name="Gemeinde" size="22" value="<?php echo $row['Gemeinde'];?>"></td></tr>
<tr><th>Ortsteil</th><td><input type="text" name="Ortsteil" size="22" value="<?php echo $row['Ortsteil'];?>"></td></tr>
<tr><td></td><td><input type="hidden" value="<?php echo $FID; ?>" name="FID"><input type="hidden" value="<?php echo $row['Einsatz_ID']; ?>" name="EID"><input type="hidden" value="<?php echo $row['Funkrufname']; ?>" name="Funkrufname"><input type="hidden" value="<?php echo $row['Fahrzeug']; ?>" name="Fahrzeug"><input type="submit" value="senden"></td></tr>

</form></table>
  </body>
  
  <script>
function myFunction1() {
	
	var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Alarmiert").value = today;
}
</script>

  <script>
function myFunction2() {
	
	var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Ausgerueckt").value = today;
}
</script>

  <script>
function myFunction3() {
	
	var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Bereitstellung").value = today;
}
</script>

  <script>
function myFunction4() {
	
	var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Einsatzstelle").value = today;
}
</script>

  <script>
function myFunction5() {
	
	var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("EAb").value = today;
}
</script>
</html>