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

$sql = "SELECT Funkrufname FROM Fahrzeuge WHERE `Fahrzeuge`.`id` = $FID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $Funkrufname = $row["Funkrufname"];
    }
} else {
    $Funkrufname = "Fahrzeug nicht gefunden!";
}
$conn->close();
?>
<meta charset="utf-8">
<h2>
    <?php echo $Funkrufname; ?>
</h2>
<form method="post" action="frame/Fahrzeug.Lagemeldung.send.php" autocomplete="off">
    <div class="form-group mt-1">
        <textarea name="postText" class="form-control" rows="3"></textarea>
        <input name="postUsername" class="form-control" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
        <input name="Funkrufname" class="form-control" type="hidden" value="<?php echo $Funkrufname; ?>">
        <input name="ID" class="form-control" type="hidden" value="<?php echo $ID; ?>">
        <input class="form-control" type="submit" value="Absenden">
    </div>
</form>

<br />
<button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
<?php endif;
?>
