<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
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
                  <div class="col h-100 mh-100">
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
									<a class="btn btn-primary nav-link active" href="Archiv.php">Archiv</a>
							  </li>
                        </nav>
                  </div>
                  <div class="col">
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
                  <div class="col">

                        <ul class="list-group m-2">
                              <li class="list-group-item list-group-item-secondary">
                                    Archivierte Einsätze:
                              </li>

                              <?php

                              require_once("frame/DB.php");
// Create connection
                              $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                              if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                              }

                              $sql = "SELECT id, Name FROM Einsatz WHERE Aktiv = 0 ORDER BY id";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                          echo '<li class="list-group-item list-group-item-action"><a href="frame/Export.Archiv.php?ID=' . $row["id"] . '">' . $row["Name"] . "</a></li>";
                                    }
                              } else {
                                    echo "<li class='list-group-item list-group-item-action list-group-item-danger'>Noch keine Einsätze archiviert.</li>";
                              }
                              $conn->close();
                              ?>
                        </ul>
                  </div>
            </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/modal.js"></script>
</body>

</html>
<?php
endif;
?>