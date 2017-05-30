<?php
    session_start();
    if (isset($_GET['ID']) && isset($_SESSION['userid'])):

      require_once("../dbcon.php");

      $ID = $_GET['ID'];
      $getRooms = "SELECT *
  			           FROM Einsatz
  		             WHERE ID = '$ID'";

      $roomResults = mysql_query($getRooms);

      while ($rooms = mysql_fetch_array($roomResults)) {
		  $name = $rooms['Name'];
      }
?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Einsatz: <?php echo $name; ?></title>

    <link rel="stylesheet" type="text/css" href="../main.css"/>

<script language="javascript" src="jquery-1.2.6.min.js"></script>
<script language="javascript" src="jquery.timers-1.0.0.js"></script>
<script language="javascript" src="splitter.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
	j(document).ready(function()
	{
		j(".chat-area").everyTime(500,function(i){
			j.ajax({
			  type:"GET",
			  url: "refresh.php",
			  data : { ID : "<?php  print $ID; ?>" },
			  cache: false,
			  success: function(html){
				j(".chat-area").html(html);
				if (document.getElementById('STOP').checked)
				{

					var elem = document.getElementById('chat-wrap');
					elem.scrollTop = elem.scrollHeight;

				}
			  }

			})
		})
		j(".Fahrzeug-area").everyTime(1000,function(i){
			j.ajax({
			  type:"GET",
			  url: "Fahrzeug.php",
			  data : { ID : "<?php  print $ID; ?>" },
			  cache: false,
			  success: function(html){
				j(".Fahrzeug-area").html(html);
			  }
			})
		})
	});
});
</script>
</head>
<body onload="init();">
    <div id="page-wrap">

<div id="header">

                <h1><a href="../index.php">Einsatztagebuch</a></h1>

                <div id="you"><span>Tagebuchf&uuml;hrer:</span> <?php echo $_SESSION['userid']?></br>
                <a href="../logout.php">wechseln</a></div>

        </div>
        <div id="group">
    	<div id="section">

            <div><h2><?php echo $name; ?></h2><form action="EL.php" method="post">Einsatzleiter: <input type="text" name="Einsatzleiter" value="<?php     $neuEL = "SELECT * FROM Einsatz WHERE ID='$ID'";
                                                                $Antwort = mysql_fetch_array( mysql_query($neuEL));
                                                                echo $Antwort[2];
                                                        ?>"><input type="hidden" name="nickname" value="<?php echo $_SESSION['userid']  ?>"><input type="hidden" name="ID" value="<?php echo $ID  ?>"><input type="submit"></form></div>

            <div id="chat-wrap">
                <div class="chat-area"><?php require_once("refresh.php");?></div>
            </div>

                <form id="send-message-area" method="POST" action="save.php">
                    <input name="message" type="text" id="sendie" autofocus />
					<input type="hidden" name="ID" value="<?php echo $ID;?>"/>
                </form><p id="info">Text senden mit Enter</p>
				<label><input type="checkbox" id="STOP" onclick="calc();" checked />automatisch scrollen</label>


        </div>
		<div id="splitter"></div>
		<div id="Fahrzeug">
			<div class="Fahrzeug-area"><?php require_once("Fahrzeug.php");?></div>
		</div>
		</div>

    </div>

</body> </html> <?php
    else:

    endif; ?>
