<?php
require_once("../dbcon.php");
$ID=$_GET['ID'];
$result = mysql_query("SELECT * FROM Fahrzeuge WHERE Einsatz_ID = '$ID'");

echo "<div class='Fahrzeug-area'><table id='Fahrzeug-tab'>";
echo "<tr>";
echo "<th>Funkrufname</th>";
echo "<th>Fahrzeug</th>";
echo "<th>Stärke</th>";
echo "<th>PA</th>";
echo "<th>Alarmiert</th>";
echo "<th>Ausgerückt</th>";
echo "<th>Bereitstellung</th>";
echo "<th>Einsatzstelle an</th>";
echo "<th>Einsatzstelle ab</th>";
echo "</tr>";
while($row = mysql_fetch_array($result))
  {
	$FID = $row['ID'];
	$link2 = '"Status.php?FID='.$FID.'","MyWindow","width=300, height=540"';
	$link = "<a href='#' onClick='MyWindow=window.open(". $link2 . "); return false;'>";
	
	$Alarmiert = date('H:i', strtotime($row['Alarmiert']));
	$Ausgerueckt = date('H:i', strtotime($row['Ausgerueckt']));
	$Bereitstellung = date('H:i', strtotime($row['Bereitstellung']));
	$Einsatzstelle = date('H:i', strtotime($row['Einsatzstelle']));
	$EAb = date('H:i', strtotime($row['EAb']));
	
	if ( $Alarmiert > $Ausgerueckt AND $Alarmiert > $Bereitstellung AND $Alarmiert > $Einsatzstelle AND $Alarmiert > $EAb AND $Alarmiert <> '00:00')
{
	$Alarmiert = '<p class="aktuell">'. $Alarmiert .'</p>';
	$Funkrufname = '<p class="aktuell">'. $link .$row['Funkrufname'] .'</p>';
} elseif ( $Ausgerueckt > $Bereitstellung AND $Ausgerueckt > $Einsatzstelle AND $Ausgerueckt > $EAb AND $Ausgerueckt <> '00:00')
{
	$Ausgerueckt = '<p class="aktuell">'. $Ausgerueckt .'</p>';
	$Funkrufname = '<p class="aktuell">'. $link .$row['Funkrufname'] .'</p>';
} elseif ( $Bereitstellung > $Einsatzstelle AND $Bereitstellung > $EAb AND $Bereitstellung <> '00:00')
{
	$Bereitstellung = '<p class="aktuell">'. $Bereitstellung . '</p>';
	$Funkrufname = '<p class="aktuell">'. $link .$row['Funkrufname'] .'</p>';
} elseif ( $Einsatzstelle > $EAb AND $Einsatzstelle <> '00:00')
{
	$Einsatzstelle = '<p class="aktuell">'. $Einsatzstelle. '</p>';
	$Funkrufname = '<p class="aktuell">'. $link .$row['Funkrufname'] .'</p>';
} elseif ( $EAb <> '00:00')
{
	$EAb = '<p class="aktuell">'. $EAb .'</p>';
	$Funkrufname = '<p>'. $link .$row['Funkrufname'] .'</p>';
} else 
{
	$Funkrufname = '<p>'. $link .$row['Funkrufname'] .'</p>';
}	
	echo "<tr>";
    echo '<td>'. $Funkrufname . "</a></td>";
    echo "<td>" . $row['Fahrzeug'] . "</td>";
    echo "<td>" . $row['Staerke_1'] . " / " . $row['Staerke_2'] . " / " . $row['Staerke_3'] . "</td>";
	echo "<td>" . $row['PA'] . "</td>";
	echo "<td>" . $Alarmiert . "</td>";
	echo "<td>" . $Ausgerueckt . "</td>";
	echo "<td>" . $Bereitstellung . "</td>";
	echo "<td>" . $Einsatzstelle . "</td>";
	echo "<td>" . $EAb . "</td>";
    echo "</tr>";
  }

$heute = date("Y-m-d");  
$gestern = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
$vorgestern = date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")-2, date("Y")));

  
  
$result = mysql_query("SELECT SUM(Staerke_1) AS GStaerke_1, SUM(Staerke_2) AS GStaerke_2, SUM(Staerke_3) AS GStaerke_3, SUM(PA) AS GPA FROM Fahrzeuge WHERE Einsatz_ID = '$ID' AND ( EAb='$heute' OR EAb='$gestern 00:00:00' OR EAb='$vorgestern 00:00:00') AND NOT ( Alarmiert='$heute' OR Alarmiert='$gestern 00:00:00' OR Alarmiert='$vorgestern 00:00:00')");
$row = mysql_fetch_array($result);

?><tr><td colspan='2'></td><td id="under"><?php echo $row['GStaerke_1']." / ".$row['GStaerke_2']." / ".$row['GStaerke_3']; ?></td><td id="under"><?php echo $row['GPA']; ?></td><td colspan='2'><a href='#' onClick="MyWindow=window.open('Fahrzeugadd.php?ID=<?php echo $ID; ?>','MyWindow','width=300, height=640'); return false;">Fahrzeug hinzufügen</a></td><td colspan='3'><a href="../export/Fahrzeuge.php?ID=<?php echo $ID; ?>">Druckansicht</a></td></tr></table>
</div>