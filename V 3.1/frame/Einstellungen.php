<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="Fahrzeugvorlage-tab" data-toggle="tab" href="#Fahrzeugvorlage" role="tab" aria-controls="Fahrzeugvorlage"
            aria-selected="true">Fahrzeugvorlagen</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="Orte-tab" data-toggle="tab" href="#Orte" role="tab" aria-controls="Orte" aria-selected="false">Orte</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="Fahrzeugvorlage-add-tab" data-toggle="tab" href="#Fahrzeugvorlage-add" role="tab" aria-controls="Fahrzeugvorlage-add"
            aria-selected="false">Fahrzeugvorlage hinzufügen</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="Orte-add-tab" data-toggle="tab" href="#Orte-add" role="tab" aria-controls="Orte-add" aria-selected="false">Ort hinzufügen</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade " id="Orte" role="tabpanel" aria-labelledby="Orte-tab">

        <?php
require_once("DB.php");
		// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Landkreis, Gemeinde, Ortsteil FROM Orte ORDER BY Landkreis, Gemeinde, Ortsteil";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-hover mt-2'><tr><th>Landkreis</th><th>Gemeinde</th><th>Ortsteil</th></tr>";
			// output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Landkreis"] . "</td><td>" . $row["Gemeinde"] . "</td><td>" . $row["Ortsteil"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

    </div>
    <div class="tab-pane fade show active" id="Fahrzeugvorlage" role="tabpanel" aria-labelledby="Fahrzeugvorlage-tab">

        <?php
		// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Fahrzeugvorlage.Funkrufname, Fahrzeugvorlage.Fahrzeug, Fahrzeugvorlage.Funktion, Fahrzeugvorlage.Erstauswahl, Orte.Landkreis, Orte.Gemeinde, Orte.Ortsteil FROM `Fahrzeugvorlage`, Orte WHERE Fahrzeugvorlage.Ort = Orte.id ORDER BY Fahrzeugvorlage.Erstauswahl DESC, Orte.Landkreis, Orte.Gemeinde, Orte.Ortsteil, Fahrzeugvorlage.Funkrufname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-hover mt-2'><tr><th>Funkrufname</th><th>Fahrzeug</th><th>Funktion</th><th>Landkreis</th><th>Gemeinde</th><th>Ortsteil</th><th>Erstauswahl</th></tr>";
			// output data of each row
    while ($row = $result->fetch_assoc()) {
        $class = 'class=""';
        if ($row["Funktion"] == "FW") {
            $class = 'class="table-danger"';
        } else if ($row["Funktion"] == "RD") {
            $class = 'class="table-light"';
        } else if ($row["Funktion"] == "THW") {
            $class = 'class="table-primary"';
        } else if ($row["Funktion"] == "Kats") {
            $class = 'class="table-warning"';
        } else if ($row["Funktion"] == "Pol") {
            $class = 'class="table-success"';
        }

        if ($row["Erstauswahl"] == 1) {
            $Erstauswahl = "Ja";
        } else {
            $Erstauswahl = "Nein";
        }

        echo "<tr " . $class . "><td>" . $row["Funkrufname"] . "</td><td>" . $row["Fahrzeug"] . "</td><td>" . $row["Funktion"] . "</td><td>" . $row["Landkreis"] . "</td><td>" . $row["Gemeinde"] . "</td><td>" . $row["Ortsteil"] . "</td><td>" . $Erstauswahl . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

    </div>
    <div class="tab-pane fade" id="Fahrzeugvorlage-add" role="tabpanel" aria-labelledby="Fahrzeugvorlage-add-tab">
        <form method="get" action="frame/Fahrzeugvorlage.add.php" class="mt-2" autocomplete="off">
            <div class="form-group row">
                <label for="Funkrufname" class="col-sm-2 col-form-label">Funkrufname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Funkrufname" name="Funkrufname" placeholder="Funkrufname">
                </div>
            </div>
            <div class="form-group row">
                <label for="Fahrzeug" class="col-sm-2 col-form-label">Fahrzeugtyp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Fahrzeug" name="Fahrzeug" placeholder="Fahrzeugtyp">
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Organisation</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Org" id="Org_FW" value="FW">
                            <label class="form-check-label" for="Org_FW">
                                Feuerwehr
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Org" id="Org_RD" value="RD">
                            <label class="form-check-label" for="ORg_RD">
                                Rettungsdienst
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Org" id="Org_THW" value="THW">
                            <label class="form-check-label" for="Org_THW">
                                THW
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Org" id="Org_Kats" value="Kats" checked>
                            <label class="form-check-label" for="Org_Kats">
                                Katastrophenschutz
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="Org" id="Org_Pol" value="Pol" disabled>
                            <label class="form-check-label" for="Org_Pol">
                                Polizei
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="Standort" class="col-sm-2 col-form-label">Standort</label>
                <div class="col-sm-10">
                    <select id="Standort" name="Standort" class="form-control">
                        <?php
						// Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT id, Landkreis, Gemeinde, Ortsteil FROM Orte ORDER BY Landkreis, Gemeinde, Ortsteil";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
						// output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["id"] . "'>" . $row["Landkreis"] . " - " . $row["Gemeinde"] . " - " . $row["Ortsteil"] . "</option>";
                            }

                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Erstauswahl</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Erstauswahl" name="Erstauswahl">
                        <label class="form-check-label" for="Erstauswahl">
                            Zur Erstauswahl hinzufügen
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Fahrzeug hinzufügen</button>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="Orte-add" role="tabpanel" aria-labelledby="Orte-add-tab">
        <form method="get" action="frame/Orte.add.php" class="mt-2" autocomplete="on">
            <div class="form-group row">
                <label for="Landkreis" class="col-sm-2 col-form-label">Landkreis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Landkreis" name="Landkreis" placeholder="Landkreis">
                </div>
            </div>
            <div class="form-group row">
                <label for="Gemeinde" class="col-sm-2 col-form-label">Gemeinde</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Gemeinde" name="Gemeinde" placeholder="Gemeinde">
                </div>
            </div>
            <div class="form-group row">
                <label for="Ortsteil" class="col-sm-2 col-form-label">Ortsteil</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Ortsteil" name="Ortsteil" placeholder="Ortsteil">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ort hinzufügen</button>
                </div>
            </div>
        </form>
    </div>
</div>
