<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
  require_once("index.php");
else :
  $ID = $_GET["ID"];
$FID = $_GET["FID"];

require_once("DB.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Funkrufname`, `Fahrzeug`, `Staerke_1`, `Staerke_2`, `Staerke_3`, `PA`, `Alarmiert`, `Ausgerueckt`, `Bereitstellung`, `EAn`, `EAb` FROM `Fahrzeuge` WHERE `Fahrzeuge`.id = '$FID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while ($row = $result->fetch_assoc()) {
    $Funkrufname = $row["Funkrufname"];
    $Fahrzeug = $row["Fahrzeug"];
    $Staerke_1 = $row["Staerke_1"];
    $Staerke_2 = $row["Staerke_2"];
    $Staerke_3 = $row["Staerke_3"];
    $PA = $row["PA"];
    $Alarmiert = $row["Alarmiert"];
    $Ausgerueckt = $row["Ausgerueckt"];
    $Bereitstellung = $row["Bereitstellung"];
    $EAn = $row["EAn"];
    $EAb = $row["EAb"];
  }
} else {
  echo "Fehler";
}
$conn->close();
?>
<form action="frame/Fahrzeug.change.send.php" method="post" autocomplete="off">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Funkrufname</label>
    <div class="col-sm-8">
      <input name="Funkrufname" type="text" readonly class="form-control-plaintext" value="<?php echo $Funkrufname; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Fahrzeug</label>
    <div class="col-sm-8">
      <input name="Fahrzeug" type="text" readonly class="form-control-plaintext" value="<?php echo $Fahrzeug; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Stärke</label>
    <div class="col-sm-2">
      <input name="Staerke_1" type="text" class="form-control" value="<?php echo $Staerke_1; ?>">
    </div>
    <div class="col-sm-1">
      <input type="text" readonly class="form-control-plaintext" value="/">
    </div>
    <div class="col-sm-2">
      <input name="Staerke_2" type="text" class="form-control" value="<?php echo $Staerke_2; ?>">
    </div>
    <div class="col-sm-1">
      <input type="text" readonly class="form-control-plaintext" value="/">
    </div>
    <div class="col-sm-2">
      <input name="Staerke_3" type="text" class="form-control" value="<?php echo $Staerke_3; ?>">
    </div>
  </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">PA</label>
    <div class="col-sm-8">
      <input name="PA" type="text" class="form-control" value="<?php echo $PA; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Alarmiert</label>
	<div class="col-sm-4">
	  <input name="AlarmiertDate" id="AlarmiertDate<?php echo $FID?>" type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($Alarmiert)); ?>">
	</div>
    <div class="col-sm-4">
      <input name="Alarmiert" onclick="myFunction1()" id="Alarmiert<?php echo $FID?>" type="time" class="form-control" value="<?php echo date("H:i", strtotime($Alarmiert)); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Ausgerückt</label>
    <div class="col-sm-4">
      <input name="AusgeruecktDate" id="AusgeruecktDate<?php echo $FID?>" type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($Ausgerueckt)); ?>">
    </div>
	<div class="col-sm-4">
      <input name="Ausgerueckt" onclick="myFunction2()" id="Ausgerueckt<?php echo $FID?>" type="time" class="form-control" value="<?php echo date("H:i", strtotime($Ausgerueckt)); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Bereitstellung</label>
	<div class="col-sm-4">
      <input name="BereitstellungDate" id="BereitstellungDate<?php echo $FID?>" type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($Bereitstellung)); ?>">
    </div>
    <div class="col-sm-4">
      <input name="Bereitstellung" onclick="myFunction3()" id="Bereitstellung<?php echo $FID?>" type="time" class="form-control" value="<?php echo date("H:i", strtotime($Bereitstellung)); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">E an</label>
	<div class="col-sm-4">
      <input name="EAnDate" id="EAnDate<?php echo $FID?>" type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($EAn)); ?>">
    </div>
    <div class="col-sm-4">
      <input name="EAn" onclick="myFunction4()" id="EAn<?php echo $FID?>" type="time" class="form-control" value="<?php echo date("H:i", strtotime($EAn)); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">E ab</label>
	<div class="col-sm-4">
      <input name="EAbDate" id="EAbDate<?php echo $FID?>" type="date" class="form-control" value="<?php echo date("Y-m-d", strtotime($EAb)); ?>">
    </div>
    <div class="col-sm-4">
      <input name="EAb" onclick="myFunction5()" id="EAb<?php echo $FID?>" type="time" class="form-control" value="<?php echo date("H:i", strtotime($EAb)); ?>">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input name="postUsername" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
      <input name="ID" type="hidden" value="<?php echo $ID; ?>">
      <input name="FID" type="hidden" value="<?php echo $FID; ?>">
      <button type="submit" class="btn btn-primary">Änderung senden</button>
      <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Schließen</button>
    </div>
  </div>
</form>
<form action="frame/Fahrzeug.change.remove.php" method="post">
      <input name="postUsername" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
      <input name="FID" type="hidden" value="<?php echo $FID; ?>">
	  <input name="Funkrufname" type="hidden" value="<?php echo $Funkrufname; ?>">
	  <input name="Fahrzeug" type="hidden" value="<?php echo $Fahrzeug; ?>">
	  <input name="ID" type="hidden" value="<?php echo $ID; ?>">
      <button type="submit" class="btn btn-danger" onclick="return msgBox();">Fahrzeug entfernen</button>
</form>
<script type="text/javascript">function msgBox()
{
  return window.confirm("Soll das Fahrzeug wirklich aus dem Einsatz entfernt werden?");
}
//-->
</script>
<script type="text/javascript">
 function myFunction1() {
	 var today = new Date();
     var Year = today.getFullYear();
	 var Month = today.getMonth() + 1;
	 var Day = today.getDate();
	 
	 var HH = today.getHours();
     var mm = today.getMinutes();

     if (mm < 10) {
       mm = '0' + mm;
     }
     
     if (Day < 10) {
       Day = '0' + Day
     }
	 
	if (Month < 10) {
       Month = '0' + Month
     }
	 
	 var todaydate = Year + '-' + Month + '-' + Day;
     today = HH + ':' + mm;

     document.getElementById("Alarmiert<?php echo $FID?>").value = today;
	 document.getElementById("AlarmiertDate<?php echo $FID?>").value = todaydate;
   }
 </script>

<script type="text/javascript">
 function myFunction2() {
	 var today = new Date();
     var Year = today.getFullYear();
	 var Month = today.getMonth() + 1;
	 var Day = today.getDate();
	 
	 var HH = today.getHours();
     var mm = today.getMinutes();

     if (mm < 10) {
       mm = '0' + mm;
     }
     
     if (Day < 10) {
       Day = '0' + Day
     }
	 
	if (Month < 10) {
       Month = '0' + Month
     }
	 
	 var todaydate = Year + '-' + Month + '-' + Day;
     today = HH + ':' + mm;

     document.getElementById("Ausgerueckt<?php echo $FID?>").value = today;
	 document.getElementById("AusgeruecktDate<?php echo $FID?>").value = todaydate;
   }
 </script>

<script type="text/javascript">
 function myFunction3() {
	 var today = new Date();
     var Year = today.getFullYear();
	 var Month = today.getMonth() + 1;
	 var Day = today.getDate();
	 
	 var HH = today.getHours();
     var mm = today.getMinutes();

     if (mm < 10) {
       mm = '0' + mm;
     }
     
     if (Day < 10) {
       Day = '0' + Day
     }
	 
	if (Month < 10) {
       Month = '0' + Month
     }
	 
	 var todaydate = Year + '-' + Month + '-' + Day;
     today = HH + ':' + mm;

     document.getElementById("Bereitstellung<?php echo $FID?>").value = today;
	 document.getElementById("BereitstellungDate<?php echo $FID?>").value = todaydate;
   }
 </script>

<script type="text/javascript">
 function myFunction4() {
	 var today = new Date();
     var Year = today.getFullYear();
	 var Month = today.getMonth() + 1;
	 var Day = today.getDate();
	 
	 var HH = today.getHours();
     var mm = today.getMinutes();

     if (mm < 10) {
       mm = '0' + mm;
     }
     
     if (Day < 10) {
       Day = '0' + Day
     }
	 
	if (Month < 10) {
       Month = '0' + Month
     }
	 
	 var todaydate = Year + '-' + Month + '-' + Day;
     today = HH + ':' + mm;

     document.getElementById("EAn<?php echo $FID?>").value = today;
	 document.getElementById("EAnDate<?php echo $FID?>").value = todaydate;
   }
 </script>

<script type="text/javascript">
 function myFunction5() {
	 var today = new Date();
     var Year = today.getFullYear();
	 var Month = today.getMonth() + 1;
	 var Day = today.getDate();
	 
	 var HH = today.getHours();
     var mm = today.getMinutes();

     if (mm < 10) {
       mm = '0' + mm;
     }
     
     if (Day < 10) {
       Day = '0' + Day
     }
	 
	if (Month < 10) {
       Month = '0' + Month
     }
	 
	 var todaydate = Year + '-' + Month + '-' + Day;
     today = HH + ':' + mm;

     document.getElementById("EAb<?php echo $FID?>").value = today;
	 document.getElementById("EAbDate<?php echo $FID?>").value = todaydate;
   }
 </script>
<?php endif;
?>
