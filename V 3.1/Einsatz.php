<?php
if (end(explode("/", $_SERVER['REQUEST_URI'])) == "index.php") :
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
                                    <a class="btn btn-primary nav-link active" href="index.php">Einsatzübersicht</a>
                              </li>
                              <li class="nav-item pt-2 mx-2">
                                    <a href="javascript:void(0)" data-href="frame/Einstellungen.php" class="openPopup btn btn-primary nav-link">Einstellungen</a>
                              </li>
							  <li class="nav-item pt-2">
									<a class="btn btn-primary nav-link" href="Archiv.php">Archiv</a>
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
                                    <form method="get" action="frame/Einsatz.php" class="form-inline" autocomplete="off">
                                          <div class="form-group ">
                                                <input id="Einsatz" class="form-control" type="text" placeholder="Einsatzstichwort" required name="Einsatz">
                                                <input class="form-control" type="submit" value="Einsatz anlegen">
                                          </div>
                                    </form>
                              </li>

                              <?php

                              require_once("frame/DB.php");
// Create connection
                              $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                              if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                              }

                              $sql = "SELECT id, Name FROM Einsatz WHERE Aktiv = 1 ORDER BY id";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                          echo '<li class="list-group-item list-group-item-action"><a href="ETB.php?ID=' . $row["id"] . '">' . $row["Name"] . "</a><a href='frame/Einsatz.remove.php?ID=".$row["id"]."' class='float-right'><img src='images/trash-2x.png'></a></li>";
                                    }
                              } else {
                                    echo "<li class='list-group-item list-group-item-action list-group-item-danger'>Noch keine Einsätze angelegt.</li>";
                              }
                              $conn->close();
                              ?>
                        </ul>
                  </div>
            </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                  <!-- Modal content-->
                  <div class="modal-content">
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
                        </div>
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
else:
header('Location: index.php');
endif;
?>