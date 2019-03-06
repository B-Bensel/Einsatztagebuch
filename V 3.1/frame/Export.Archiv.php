<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
      require_once("index.php");
else :
      $ID = $_GET['ID'];
	  
	  require_once("../frame/DB.php");
// Create connection
                              $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                              if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                              }

                              $sql = "SELECT Aktiv FROM Einsatz WHERE ID = $ID LIMIT 1";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                          $Status = 0;
                                    }
                              } else {
                                    $Status = 1;
                              }
                              $conn->close();
	//Nur archivierten Einträge anzeigen
	if ($Status == 1) :
		require_once("../index.php");
	else :?>
<?php
echo "<h1>Archivierter Einsatz</h1>";
include("Export.php");
endif;endif;
?>