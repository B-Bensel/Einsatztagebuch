<?php
require_once("../dbcon.php");

$ID=$_GET['ID'];
$result = mysql_query("SELECT * FROM Eintrag WHERE Einsatz_ID = '$ID' ORDER BY Zeit ASC");
$i = 0;
echo "<div class='chat-area'><table>";
while($row = mysql_fetch_array($result))
  {
	echo "<tr>";
	echo "<td>".++$i.".</td>";
    echo "<td>" . date('d.m.Y H:i', strtotime($row['Zeit'])) . "</td>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Eintragtext'] . "</td>";
    echo "</tr>";
  }
echo "</table></div>";
mysql_close($con);
?>
