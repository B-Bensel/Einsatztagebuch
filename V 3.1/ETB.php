<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
      require_once("index.php");
else :
      $ID = $_GET['ID'];
	   

                              require_once("frame/DB.php");
// Create connection
                              $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                              if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                              }

                              $sql = "SELECT Aktiv, Name FROM Einsatz WHERE ID = $ID AND Aktiv = 1 LIMIT 1";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                          $Status = 0;
					  $Name = $row["Name"];
                                    }
                              } else {
                                    $Status = 1;
                              }
                              $conn->close();
	//Keine archivierten Einträge anzeigen
	if ($Status == 1) :
		require_once("index.php");
	else :
?>
<!DOCTYPE HTML>
<html class="h-100">

<head>
      <title>Einsatztagebuch</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="h-100">
      <div class="container-fluid h-100 mh-100 w-100 bg-dark">
            <div class="row h-10 mh-10">
                  <div class="col-lg-8 h-100 mh-100">
                        <nav class="nav h-100 mh-100">
                              <li class="nav-item h-100 mh-100 ">
                                    <a class="nav-link h-100 mh-100" href="index.php">
                                          <img class="h-100 mh-100 shadow-sm p-1 mb-5 bg-white rounded" src="images/Logo.png">
                                    </a>
                              </li>
                              <li class="nav-item pt-2">
                                    <a class="btn btn-primary nav-link" href="index.php">Einsatzübersicht</a>
                              </li>
                              <li class="nav-item pt-2 mx-2">
                                    <a class="btn btn-primary nav-link" href="frame/Export.php?ID=<?php echo $ID; ?>">Exportieren</a>
                              </li>
			      <li class="nav-item pt-2">
				<p class="btn btn-primary nav-link disabled text-white">aktueller Einsatz: <?php echo $Name;?></p>
			      </li>
                        </nav>
			
                  </div>
                  <div class="col-lg-4">
                        <nav class="nav pt-2 float-right">
                              <p class="text-white pt-3 mr-4">Tagebuchführer:
                                    <?php echo $_SESSION['userid']; ?>
                              </p>
                              <li class="nav-item">
                                    <a class="btn btn-primary nav-link" href="frame/ausloggen.php">wechseln</a>
                              </li>
                        </nav>
                  </div>
            </div>
            <div class="row h-90 mh-90 bg-light">
                  <div class="col-5 h-100 mh-100">
                        <div class="row h-75 mh-75">
                              <div id="Lagemeldungen" class="col h-100 mh-100 px-0" style="overflow-y: scroll">

                              </div>
                        </div>
                        <div class="row h-25 mh-75">
                              <div class="col">
                                    <form method="post" action="chatterEngine.php" id="formPostChat" autocomplete="off">
                                          <div class="form-group mt-1">
                                                <textarea id="postText" class="form-control" rows="3"></textarea>
                                                <input id="postUsername" class="form-control" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
                                                <input class="form-control" type="submit" value="Absenden">
                                                <span class="errorMessage" id="postError"></span>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
                  <div class="col-7 h-100 mh-100">
                        <div class="table-responsive h-100 mh-100" id="FahrzeugTabelle">

                        </div>
                  </div>
            </div>

      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Fahrzeugstatus bearbeiten</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <div class="modal-body">

                        </div>

                  </div>
            </div>
      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chatterScript.js"></script>
      <script src="js/fahrzeugScript.js"></script>
      <script src="js/modalFahrzeug.js"></script>
</body>

</html>
<?php endif;endif;
?>