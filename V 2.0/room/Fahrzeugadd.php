<html lang="de">
	<head>
		<meta charset="utf-8">
		<title>Fahrzeug &auml;ndern</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
<?php
	require_once("../dbcon.php");
	$ID=$_GET['ID'];
	$Funkrufname=$_GET['Funkrufname'];
	$Fahrzeug=$_GET['Fahrzeug'];
	$Landkreis=$_GET['Landkreis'];
	$Gemeinde=$_GET['Gemeinde'];
	$Ortsteil=$_GET['Ortsteil'];
?>
	<body>
		<h2>Fahrzeug hinzufügen</h2>
			<table>
				<form action="Fahrzeugadd_update.php" method="post">
					<tr><th>Funkrufname</th><td><input type="text" name="Funkrufname" size="22" list="Organisationen" value="<?php echo $Funkrufname; ?>"></td></tr>
					<tr><th>Fahrzeug</th><td><input type="text" name="Fahrzeug" size="22" list="Fahrzeuge" value="<?php echo $Fahrzeug; ?>"></td></tr>
					<!-- Organisationsvorschlag -->
					<datalist id="Organisationen">
						<option value="Akkon">
						<option value="Bergwacht">
						<option value="Christoph">
						<option value="Florian">
						<option value="Heros">
						<option value="Johannes">
						<option value="KatS">
						<option value="Tetra">
						<option value="Pelikan">
						<option value="Rettung">
						<option value="Rotkreuz">
						<option value="Sama">
					</datalist>
					<!-- Fahrzeugvorschlag -->
					<datalist id="Fahrzeuge">
						<option value="01">
						<option value="02">
						<option value="03">
						<option value="04">
						<option value="05">
						<option value="06">
						<option value="LNA">
						<option value="OLRD">
						<option value="KdoW">
						<option value="ELW 1">
						<option value="ELW 2">
						<option value="ELW 3">
						<option value="FmSt">
						<option value="GW-IuK">
						<option value="Krad">
						<option value="Pkw">
						<option value="BtKombi">
						<option value="MTW">
						<option value="KLF">
						<option value="VLF">
						<option value="TLF">
						<option value="TLF 16/25">
						<option value="HTLF">
						<option value="TLF 24/50">
						<option value="TLF 20/40">
						<option value="TLF 20/40">
						<option value="GTLF">
						<option value="FLF">
						<option value="TroTLF">
						<option value="SoLmF">
						<option value="TroLF">
						<option value="SMF">
						<option value="SO_TLF">
						<option value="DLK 23">
						<option value="DLK 18">
						<option value="DLK 12">
						<option value="DL 23">
						<option value="DL 18">
						<option value="DL 16">
						<option value="SO_HAB">
						<option value="GM">
						<option value="HAB 18">
						<option value="HAB 23">
						<option value="HAB">
						<option value="SO_DL">
						<option value="StLF 10/6">
						<option value="StLF 20">
						<option value="StLF">
						<option value="LF 8">
						<option value="LF 8/6">
						<option value="HLF 8/6">
						<option value="LF 10/6">
						<option value="HLF 10/6">
						<option value="LF 16">
						<option value="LF 16/12">
						<option value="HLF 16">
						<option value="HLF 16/12">
						<option value="LF 16-TS">
						<option value="LF-KatS">
						<option value="LF 20/16">
						<option value="HLF 20/16">
						<option value="TSF">
						<option value="TSF-W">
						<option value="SO_LF">
						<option value="VRW">
						<option value="RW 1">
						<option value="GW-L/TH">
						<option value="RW 2">
						<option value="RW">
						<option value="FwK">
						<option value="SO_RW">
						<option value="GW-G">
						<option value="GW-A">
						<option value="GW-Tauch">
						<option value="GW-WR">
						<option value="SO_GW">
						<option value="GW-Licht">
						<option value="SW 1000">
						<option value="SW 2000">
						<option value="SW-KatS">
						<option value="KLkw">
						<option value="GW-N">
						<option value="GW-L1">
						<option value="Lkw-Lbw">
						<option value="WLF 18">
						<option value="WLF 26">
						<option value="WLF 18-K">
						<option value="WLF 26-K">
						<option value="GW-L2">
						<option value="Lkw-Lbw">
						<option value="SO_Lkw">
						<option value="GW-Mess">
						<option value="MLK">
						<option value="GW-StrSp">
						<option value="ABC-Erk">
						<option value="Dekon V">
						<option value="Dekon P">
						<option value="Dekon P+">
						<option value="GW-Bt">
						<option value="BtLkw">
						<option value="GW-T">
						<option value="LB">
						<option value="HLB">
						<option value="RTB">
						<option value="MZB">
						<option value="SO_Fzg">
						<option value="Arzt-Pkw">
						<option value="ZSH">
						<option value="RTH">
						<option value="ITH">
						<option value="NAW">
						<option value="NEF">
						<option value="RTW">
						<option value="RTW-Z">
						<option value="Baby-NAW">
						<option value="ITW">
						<option value="GRTW">
						<option value="SO_RM">
						<option value="BHP">
						<option value="KTW-A1">
						<option value="KTW-A2">
						<option value="KTW-B">
						<option value="KTW-4">
						<option value="GW-Beh">
						<option value="GW-San">
						<option value="I-KTW">
						<option value="GKTW">
						<option value="SO_KTW">
						<option value="ATrKw">
					</datalist>

					<tr><th>St&auml;rke</th><td><input type="text" name="Staerke_1" size="3"> / <input type="text" name="Staerke_2" size="3"> / <input type="text" name="Staerke_3" size="3"></td></tr>
					<tr><th>PA</th><td><input type="text" name="PA" size="3"></td></tr>
					<tr><th>Alarmiert</th><td><input onclick="myFunction1()" id="Alarmiert" type="text" name="Alarmiert" size="22"></td></tr>
					<tr><th>Ausger&uuml;ckt</th><td><input onclick="myFunction2()" id="Ausgerueckt" type="text" name="Ausgerueckt" size="22"></td></tr>
					<tr><th>Bereitstellung</th><td><input onclick="myFunction3()" id="Bereitstellung" type="text" name="Bereitstellung" size="22"></td></tr>
					<tr><th>Einsatzstelle an</th><td><input onclick="myFunction4()" id="Einsatzstelle" type="text" name="Einsatzstelle" size="22"></td></tr>
					<tr><th>Einsatzstelle ab</th><td><input onclick="myFunction5()" id="EAb" type="text" name="EAb" size="22"></td></tr>
					<tr><th>Landkreis</th><td><input type="text" name="Landkreis" size="22" value="<?php echo $Landkreis; ?>"></td></tr>
					<tr><th>Gemeinde</th><td><input type="text" name="Gemeinde" size="22" value="<?php echo $Gemeinde; ?>"></td></tr>
					<tr><th>Ortsteil</th><td><input type="text" name="Ortsteil" size="22" value="<?php echo $Ortsteil; ?>"></td></tr>
					<tr><td></td><td><input type="hidden" value="<?php echo $ID; ?>" name="ID"><input type="submit" value="senden"></td></tr>
			</form>
		</table>
	<h3>Fahrzeugvorlagen</h3>
	<div class="css-treeview">
		<ul>
			<li><input type="checkbox" id="item-0" /><label for="item-0">Feuerwehr</label>
				<ul>
					<li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Gießen</label>
						<ul>
							<!-- Langgöns -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Langgöns</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Langgöns' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC;");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Linden -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Linden</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Linden' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Allendorf/Lumda -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Allendorf/Lumda</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Allendorf/Lda' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Biebertal -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Biebertal</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Biebertal' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Buseck -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Buseck</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Buseck' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Fernwald -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Fernwald</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Fernwald' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Gießen -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Gießen</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Gießen' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Landkreis Gießen -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Landkreis Gießen</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Landkreis Gießen' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Grünberg -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Grünberg</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Grünberg' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Heuchelheim -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Heuchelheim</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Heuchelheim' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Hungen -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Hungen</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Hungen' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Laubach -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Laubach</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Laubach' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Lich -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Lich</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Lich' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Lollar -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Lollar</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Lollar' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Pohlheim -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Pohlheim</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Pohlheim' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Rabenau -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Rabenau</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Rabenau' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Reiskirchen -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Reiskirchen</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Reiskirchen' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Staufenberg -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Staufenberg</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Staufenberg' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Wettenberg -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Wettenberg</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Wettenberg' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Bosch -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Bosch</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Ortsteil = 'Bosch' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
							<!-- Schunk -->
							<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Schunk</label>
								<ul>
									<?php
										$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Ortsteil = 'Schunk' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
										while($row = mysql_fetch_array($result))
										{
											echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
										}
									?>
								</ul>
							</li>
						</ul>
					</li>
				<!-- Wetteraukreis -->
				<li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Wetteraukreis</label>
                    <ul>
						<!-- Butzbach -->
                        <li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Butzbach</label>
                            <ul>
								<?php
									$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Butzbach' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
									while($row = mysql_fetch_array($result))
									{
										echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
									}
								?>
                            </ul>
                        </li>
                    </ul>
                </li>
				<!-- Lahn-Dill -->				
				<li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Lahn-Dill</label>
                    <ul>
						<!-- Hüttenberg -->
                        <li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Hüttenberg</label>
                            <ul>
								<?php
									$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Gemeinde = 'Hüttenberg' AND Funktion='F' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
									while($row = mysql_fetch_array($result))
									{
										echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
									}
								?>
                            </ul>
                        </li>
					</ul>
                </li>
			</ul>
		</li>
	</ul>
	
	
	
	<ul>
        <li><input type="checkbox" id="item-0" /><label for="item-0">Rettungsdienst</label>
            <ul>
                <li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Gießen</label>
                    <ul>
						<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Regelrettungsdienst</label>
                            <ul>
                        		<?php 
									$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Landkreis = 'Gießen' AND Funktion='RD' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
									while($row = mysql_fetch_array($result))
									{
										echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
									}
								 ?>
                            </ul>
                        </li>
						<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Zusatzkomponenten</label>
                            <ul>
                        		<?php 
									$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Landkreis = 'Gießen' AND Funktion='R' ORDER BY `Fahrzeugvorlage`.`Funkrufname` ASC");
									while($row = mysql_fetch_array($result))
									{
										echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
									}
								 ?>
                            </ul>
                        </li>
                    </ul>
                </li>
			</ul>
		</li>
	</ul>
	
	
	
	<ul>
        <li><input type="checkbox" id="item-0" /><label for="item-0">THW</label>
            <ul>
                <li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Gießen</label>
                    <ul>
                        <li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Gießen</label>
                            <ul>
								<?php 
									$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Funktion = 'T' AND Ortsteil='Gießen'");
									while($row = mysql_fetch_array($result))
									{
										echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
									}
								?>
                            </ul>
                        </li>
						<li><input type="checkbox" id="item-0-0-0" /><label for="item-0-0-0">Grünberg</label>
                            <ul>
								<?php 
									$result = mysql_query("SELECT * FROM Fahrzeugvorlage WHERE Funktion = 'T' AND Ortsteil='Grünberg'");
									while($row = mysql_fetch_array($result))
									{
										echo "<li><a href='Fahrzeugadd.php?ID=$ID&Funkrufname=". $row['Funkrufname'] ."&Fahrzeug=". $row['Fahrzeug'] ."&Landkreis=". $row['Landkreis'] ."&Gemeinde=". $row['Gemeinde'] ."&Ortsteil=". $row['Ortsteil'] ."'>". $row['Funkrufname'] ." - ". $row['Fahrzeug'] ."</a></li>";
									}
								?>
                            </ul>
                        </li>
                    </ul>
                </li>
			</ul>
		</li>
	</ul>
</div>
</body>
<!-- aktuelle Uhrzeit in Feld -->  
<script>
function myFunction1() {
	
var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Alarmiert").value = today;
}
</script>
<!-- aktuelle Uhrzeit in Feld -->  
<script>
function myFunction2() {
	
var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Ausgerueckt").value = today;
}
</script>
<!-- aktuelle Uhrzeit in Feld -->  
<script>
function myFunction3() {
	
var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Bereitstellung").value = today;
}
</script>
<!-- aktuelle Uhrzeit in Feld -->  
<script>
function myFunction4() {
	
var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("Einsatzstelle").value = today;
}
</script>
<!-- aktuelle Uhrzeit in Feld -->  
<script>
function myFunction5() {
	
var today = new Date();
var HH = today.getHours();
var mm = today.getMinutes();

if(mm<10) {
    mm='0'+mm
} 

today = HH+':'+mm;
	
    document.getElementById("EAb").value = today;
}
</script>
</html>