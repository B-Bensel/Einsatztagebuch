<?php

/**
 * Server-side file.
 * This file is an infinitive loop. Seriously.
 * It gets the file data.txt's last-changed timestamp, checks if this is larger than the timestamp of the
 * AJAX-submitted timestamp (time of last ajax request), and if so, it sends back a JSON with the data from
 * data.txt (and a timestamp). If not, it waits for one seconds and then start the next while step.
 *
 * Note: This returns a JSON, containing the content of data.txt and the timestamp of the last data.txt change.
 * This timestamp is used by the client's JavaScript for the next request, so THIS server-side script here only
 * serves new content after the last file change. Sounds weird, but try it out, you'll get into it really fast!
 */

// set php runtime to unlimited
set_time_limit(0);

// where does the data come from ? In real world this would be a SQL query or something
$data_source_file = 'data.txt';

// main loop
while (true) {

    // if ajax request has send a timestamp, then $last_ajax_call = timestamp, else $last_ajax_call = null
    $last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;
    $ID = $_GET["id"];
    // PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
    clearstatcache();
    // get timestamp of when file has been changed the last time
    require_once("frame/DB.php");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Aktualisierung FROM `$dbname`.`Fahrzeuge` WHERE EinsatzId = $ID ORDER BY Aktualisierung DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while ($row = $result->fetch_assoc()) {
            $last_change_in_data_file = date("U", strtotime($row["Aktualisierung"]));
        }
    } else {
        $last_change_in_data_file = 0;
    }
    $conn->close();





    // if no timestamp delivered via ajax or data.txt has been changed SINCE last ajax timestamp
    if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call) {

        // get content of data.txt
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, Funkrufname, Fahrzeug, Staerke_1, Staerke_2, Staerke_3, PA, Alarmiert, Ausgerueckt, Bereitstellung, EAn, EAb,(Staerke_1 + Staerke_2 + Staerke_3) AS gStaerke4 FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 1  ORDER BY Funkrufname";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    // output data of each row
            $data = "<table class='table table-bordered table-hover table-sm mt-2'><tr><th>Funkrufname</th><th>Fahrzeug</th><th>Stärke</th><th>PA</th><th>Alarmiert</th><th>Ausgerückt</th><th>Bereitstellung</th><th>E an</th><th>E ab</th></tr>";
            while ($row = $result->fetch_assoc()) {
				$bgalarmiert = '';
				$bgausgerueckt ='';
				$bgbereitstellung = '';
				$bgean = '';
				$bgbtn = '';
				$bgeab = '';
				
				$dates = array($row["Alarmiert"], $row["Ausgerueckt"], $row["Bereitstellung"], $row["EAn"], $row["EAb"]);
				
				$maximum = max(array_map(strtotime, $dates));
				
				if (strtotime($row["EAb"]) == $maximum && strtotime($row["EAb"]) != -3600) 
					{
						$bgeab = 'bgcolor="#00FF00"';
						$bgbtn = 'btn-primary ';
					}
				else if (strtotime($row["EAn"]) == $maximum && strtotime($row["EAn"]) != -3600) 
					{
						$bgean = 'bgcolor="#00FF00"';
						$bgbtn = 'btn-success';
					}
				else if (strtotime($row["Bereitstellung"]) == $maximum && strtotime($row["Bereitstellung"]) != -3600) 
					{
						$bgbereitstellung = 'bgcolor="#ffc107"';
						$bgbtn = 'btn-warning';
					}
				else if (strtotime($row["Ausgerueckt"]) == $maximum && strtotime($row["Ausgerueckt"]) != -3600) 
					{
						$bgausgerueckt = 'bgcolor="#00FF00"';
						$bgbtn = 'btn-primary';
					}
				else if (strtotime($row["Alarmiert"]) == $maximum && strtotime($row["Alarmiert"]) != -3600) 
					{
						$bgalarmiert = 'bgcolor="#00FF00"';
						$bgbtn = 'btn-primary';
					}
				else
				{
					$bgbtn = 'btn-primary';
				};
				
				
                $data = $data . '<tr><td><button type="button" data-toggle="modal" data-target="#myModal" data-href="frame/Fahrzeug.change.php?ID=' . $ID . "&FID=" . $row["id"] . '" data-title="Fahrzeugstatus ändern" class="btn '.$bgbtn.'">' .$row["Funkrufname"] . '</button><button type="button" data-toggle="modal" data-target="#myModal" data-href="frame/Fahrzeug.Lagemeldung.php?ID=' . $ID . "&FID=" . $row["id"] . '" data-title="Lagemeldung" class="btn btn-primary ml-2"><img src="images/clipboard-3x.png"></button></td><td>' . $row["Fahrzeug"] . '</td><td>'.$row["gStaerke4"].'</td><td>' . $row["PA"] . '</td><td '.$bgalarmiert.'>' . date("H:i", strtotime($row["Alarmiert"])) . '</td><td '.$bgausgerueckt.'>' . date("H:i", strtotime($row["Ausgerueckt"])) . '</td><td '.$bgbereitstellung.'>' . date("H:i", strtotime($row["Bereitstellung"])) . '</td><td '.$bgean.'>' . date("H:i", strtotime($row["EAn"])) . '</td><td '.$bgeab.'>' . date("H:i", strtotime($row["EAb"])) . '</td></tr>';
            }
			
			$sql = "SELECT SUM(Staerke_1) AS gStaerke1, SUM(Staerke_2) AS gStaerke2, SUM(Staerke_3) AS gStaerke3, SUM(PA) AS gPA, (SUM(Staerke_1) + SUM(Staerke_2) + SUM(Staerke_3)) AS gStaerke4 FROM Fahrzeuge WHERE EinsatzId = $ID AND aktiv = 1 LIMIT 1";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc()) {
            $data = $data . "<tr><td colspan=2></td><td>".$row["gStaerke1"]." / ".$row["gStaerke2"]." / ".$row["gStaerke3"]." / <u>".$row["gStaerke4"]."</u></td><td>".$row["gPA"]."</td><td colspan=2><button type='button' data-toggle='modal' data-target='#myModal' data-href='frame/Fahrzeug.add.php?ID=" . $ID . "' data-title='Fahrzeug hinzufügen' class='btn btn-primary'>Fahrzeug hinzufügen</button></td><td colspan=3><a class='btn btn-primary' href='frame/FahrzeugDrucken.php?ID=" . $ID . "'>Druckansicht</a></td></tr></table>";
			}

        } else {
            $data = "<table class='table table-bordered table-hover table-sm mt-2'><tr><th>Funkrufname</th><th>Fahrzeug</th><th>Stärke</th><th>PA</th><th>Alarmiert</th><th>Ausgerückt</th><th>Bereitstellung</th><th>E an</th><th>E ab</th></tr>";
            $data = $data . "<tr><td colspan=2></td><td>0 / 0 / 0</td><td>0</td><td colspan=2><button type='button' data-toggle='modal' data-target='#myModal' data-href='frame/Fahrzeug.add.php?ID=" . $ID . "' data-title='Fahrzeug hinzufügen' class='btn btn-primary'>Fahrzeug hinzufügen</button></td><td colspan=3><a class='btn btn-primary' href='frame/FahrzeugDrucken.php?ID=" . $ID . "'>Druckansicht</a></td></tr></table>";
        }
        $conn->close();




        // put data.txt's content and timestamp of last data.txt change into array
        $result = array(
            'data_from_file' => $data,
            'timestamp' => $last_change_in_data_file
        );

        // encode to JSON, render the result (for AJAX)
        $json = json_encode($result);
        echo $json;

        // leave this loop step
        break;

    } else {
        // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
        sleep(5);
        continue;
    }
}
