<?php
session_start();

	//Wenn kein Benutzer eingelogt, dann Login Seite
if (!isset($_SESSION['userid'])) :
?>
<!doctype html>
<html lang="de">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/signin.css" rel="stylesheet">
  <title>Einsatztagebuch</title>
</head>
<form class="form-signin" method="post" action="frame/start.php" autocomplete="off">
  <h1 class="h3 mb-3 font-weight-normal">Name eingeben</h1>
  <label for="inputName" class="sr-only">Name</label>
  <input name="username" type="text" id="inputName" class="form-control" placeholder="Name" required autofocus/>
  <!--<div class="form-group">
    <label for="inputPosition">Position wählen</label>
    <select class="form-control" id="inputPosition" name="position">
      <option>ELW</option>
      <option>Einsatztagebuch</option>
      <option>Lagekarte</option>
      <option>S1 - Personal/Innerer Dienst</option>
      <option>S2 - Lage</option>
      <option>S3 - Einsatz</option>
      <option>S4 - Versorgung</option>
      <option>S5 - Presse- und Medienarbeit</option>
      <option>S6 - IuK</option>
      <option>Fachberater</option>
    </select>
  </div>-->
  <br/>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Starten</button>
</form>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
	//wenn Benutzer eingelogt, zeige Übersicht
else :
  require_once("Einsatz.php");
endif;
?>
