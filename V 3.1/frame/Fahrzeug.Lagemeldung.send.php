<?php
$ID = $_POST["ID"];
$text = $_POST["Funkrufname"] . " - " . $_POST["postText"];
$user = $_POST["postUsername"];
$Status = 0;

require_once("DB.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Lagemeldungen(Einsatz,username,text,insertDate,Status)
                        VALUES('$ID','$user','$text', CURRENT_TIMESTAMP,'$Status')";

if ($conn->query($sql) === true) {
    echo "Lagemeldung gespeichert.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<meta http-equiv="refresh" content="0; URL=../ETB.php?ID=<?php echo $ID; ?>">
<meta charset="utf-8">