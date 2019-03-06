<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
  require_once("index.php");
else :
  $ID = $_GET["ID"];

require_once("DB.php");
?>
<form action="frame/Fahrzeug.add.send.php" method="get" autocomplete="off">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Funkrufname</label>
    <div class="col-sm-8">
      <input name="Funkrufname" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label">Fahrzeug</label>
    <div class="col-sm-8">
      <input name="Fahrzeug" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input name="postUsername" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
      <input name="ID" type="hidden" value="<?php echo $ID; ?>">
      <button type="submit" class="btn btn-primary">Änderung senden</button>
      <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Schließen</button>
    </div>
  </div>
</form>

<hr/>

<div id="accordion">
  <div>
    <button class="btn btn-primary mb-1" data-target="#Feuerwehr" data-toggle="collapse">Feuerwehr</button>
    <div id="Feuerwehr" class="collapse">
	
 
 <?php
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Orte.id, Orte.Landkreis, Orte.Gemeinde FROM Orte, Fahrzeugvorlage WHERE Fahrzeugvorlage.Funktion = 'FW' AND Fahrzeugvorlage.Ort = Orte.id GROUP BY Orte.Gemeinde ORDER BY Orte.Landkreis, Orte.Gemeinde";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="ml-2"><button class="btn btn-link" data-target="#FW'.$row["id"].'" data-toggle="collapse">' . ($row["Landkreis"]). " - " . ($row["Gemeinde"]). '</button><div id="FW'.$row["id"].'" class="collapse"><ul>';
		
		
		// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT Funkrufname, Fahrzeug FROM Fahrzeugvorlage, Orte WHERE Fahrzeugvorlage.Ort = Orte.id AND Orte.Gemeinde = '".$row["Gemeinde"]."' AND Fahrzeugvorlage.Funktion = 'FW' ORDER BY Funkrufname";
$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo '<li><a href="frame/Fahrzeug.add.send.php?ID='.$ID.'&Funkrufname='. ($row2["Funkrufname"]).'&Fahrzeug='. ($row2["Fahrzeug"]).'&postUsername='.$_SESSION['userid'].'">'. ($row2["Funkrufname"]).' - '. ($row2["Fahrzeug"]).'</a></li>';
    }
} else {
    echo "0 results";
}
$conn2->close();
		
		
		echo  '</ul></div></div>';
    }
} else {
    echo "Noch keine Fahrzeuge hinzugefügt.";
}
$conn->close();
?>


    </div>
  </div>
  <div>
    <button class="btn btn-primary mb-1" data-target="#Rettungsdienst" data-toggle="collapse">Rettungsdienst</button>
    <div id="Rettungsdienst" class="collapse">
      
	   <?php
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Orte.id, Orte.Landkreis, Orte.Gemeinde FROM Orte, Fahrzeugvorlage WHERE Fahrzeugvorlage.Funktion = 'RD' AND Fahrzeugvorlage.Ort = Orte.id GROUP BY Orte.Gemeinde ORDER BY Orte.Landkreis, Orte.Gemeinde";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="ml-2"><button class="btn btn-link" data-target="#RD'.$row["id"].'" data-toggle="collapse">' . ($row["Landkreis"]). " - " . ($row["Gemeinde"]). '</button><div id="RD'.$row["id"].'" class="collapse"><ul>';
		
		
		// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT Funkrufname, Fahrzeug FROM Fahrzeugvorlage, Orte WHERE Fahrzeugvorlage.Ort = Orte.id AND Orte.Gemeinde = '".$row["Gemeinde"]."' AND Fahrzeugvorlage.Funktion = 'RD' ORDER BY Funkrufname";
$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo '<li><a href="frame/Fahrzeug.add.send.php?ID='.$ID.'&Funkrufname='. ($row2["Funkrufname"]).'&Fahrzeug='. ($row2["Fahrzeug"]).'&postUsername='.$_SESSION['userid'].'">'. ($row2["Funkrufname"]).' - '. ($row2["Fahrzeug"]).'</a></li>';
    }
} else {
    echo "0 results";
}
$conn2->close();
		
		
		echo  '</ul></div></div>';
    }
} else {
    echo "Noch keine Fahrzeuge hinzugefügt.";
}
$conn->close();
?>
	  
    </div>
  </div>
  <div>
    <button class="btn btn-primary mb-1" data-target="#THW" data-toggle="collapse">THW</button>
    <div id="THW" class="collapse">
      
	   <?php
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Orte.id, Orte.Landkreis, Orte.Gemeinde FROM Orte, Fahrzeugvorlage WHERE Fahrzeugvorlage.Funktion = 'THW' AND Fahrzeugvorlage.Ort = Orte.id GROUP BY Orte.Gemeinde ORDER BY Orte.Landkreis, Orte.Gemeinde";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="ml-2"><button class="btn btn-link" data-target="#THW'.$row["id"].'" data-toggle="collapse">' . ($row["Landkreis"]). " - " . ($row["Gemeinde"]). '</button><div id="THW'.$row["id"].'" class="collapse"><ul>';
		
		
		// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT Funkrufname, Fahrzeug FROM Fahrzeugvorlage, Orte WHERE Fahrzeugvorlage.Ort = Orte.id AND Orte.Gemeinde = '".$row["Gemeinde"]."' AND Fahrzeugvorlage.Funktion = 'THW' ORDER BY Funkrufname";
$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo '<li><a href="frame/Fahrzeug.add.send.php?ID='.$ID.'&Funkrufname='. ($row2["Funkrufname"]).'&Fahrzeug='. ($row2["Fahrzeug"]).'&postUsername='.$_SESSION['userid'].'">'. ($row2["Funkrufname"]).' - '. ($row2["Fahrzeug"]).'</a></li>';
    }
} else {
    echo "0 results";
}
$conn2->close();
		
		
		echo  '</ul></div></div>';
    }
} else {
    echo "Noch keine Fahrzeuge hinzugefügt.";
}
$conn->close();
?>
	  
    </div>
  </div>
  <button class="btn btn-primary mb-1" data-target="#Katastrophenschutz" data-toggle="collapse">Katastrophenschutz</button>
  <div id="Katastrophenschutz" class="collapse">
    
	 <?php
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Orte.id, Orte.Landkreis, Orte.Gemeinde FROM Orte, Fahrzeugvorlage WHERE Fahrzeugvorlage.Funktion = 'Kats' AND Fahrzeugvorlage.Ort = Orte.id GROUP BY Orte.Gemeinde ORDER BY Orte.Landkreis, Orte.Gemeinde";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="ml-2"><button class="btn btn-link" data-target="#Kats'.$row["id"].'" data-toggle="collapse">' . ($row["Landkreis"]). " - " . ($row["Gemeinde"]). '</button><div id="Kats'.$row["id"].'" class="collapse"><ul>';
		
		
		// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT Funkrufname, Fahrzeug FROM Fahrzeugvorlage, Orte WHERE Fahrzeugvorlage.Ort = Orte.id AND Orte.Gemeinde = '".$row["Gemeinde"]."' AND Fahrzeugvorlage.Funktion = 'Kats' ORDER BY Funkrufname";
$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo '<li><a href="frame/Fahrzeug.add.send.php?ID='.$ID.'&Funkrufname='. ($row2["Funkrufname"]).'&Fahrzeug='. ($row2["Fahrzeug"]).'&postUsername='.$_SESSION['userid'].'">'. ($row2["Funkrufname"]).' - '. ($row2["Fahrzeug"]).'</a></li>';
    }
} else {
    echo "0 results";
}
$conn2->close();
		
		
		echo  '</ul></div></div>';
    }
} else {
    echo "Noch keine Fahrzeuge hinzugefügt.";
}
$conn->close();
?>
	
  </div>
  <div>
    <button class="btn btn-primary mb-1" data-target="#Polizei" data-toggle="collapse">Polizei</button>
    <div id="Polizei" class="collapse">
      
	   <?php
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Orte.id, Orte.Landkreis, Orte.Gemeinde FROM Orte, Fahrzeugvorlage WHERE Fahrzeugvorlage.Funktion = 'Pol' AND Fahrzeugvorlage.Ort = Orte.id GROUP BY Orte.Gemeinde ORDER BY Orte.Landkreis, Orte.Gemeinde";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="ml-2"><button class="btn btn-link" data-target="#Pol'.$row["id"].'" data-toggle="collapse">' . ($row["Landkreis"]). " - " . ($row["Gemeinde"]). '</button><div id="Pol'.$row["id"].'" class="collapse"><ul>';
		
		
		// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT Funkrufname, Fahrzeug FROM Fahrzeugvorlage, Orte WHERE Fahrzeugvorlage.Ort = Orte.id AND Orte.Gemeinde = '".$row["Gemeinde"]."' AND Fahrzeugvorlage.Funktion = 'Pol' ORDER BY Funkrufname";
$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo '<li><a href="frame/Fahrzeug.add.send.php?ID='.$ID.'&Funkrufname='. ($row2["Funkrufname"]).'&Fahrzeug='. 
($row2["Fahrzeug"]).'&postUsername='.$_SESSION['userid'].'">'. ($row2["Funkrufname"]).' - '. ($row2["Fahrzeug"]).'</a></li>';
    }
} else {
    echo "0 results";
}
$conn2->close();
		
		
		echo  '</ul></div></div>';
    }
} else {
    echo "Noch keine Fahrzeuge hinzugefügt.";
}
$conn->close();
?>
	  
    </div>
  </div>
</div>
<?php endif;
?>
