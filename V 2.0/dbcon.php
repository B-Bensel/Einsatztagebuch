<?php
//Zugangsdaten zu Datenbank
define(HOST,  'localhost');
define(USERNAME, '<>USERNAME<>');
define(PASSWORD, '<>PASSWORD<>');
define(DATABASE, '<>DATABASE<>');

  //Mit Datenbank verbinden
  mysql_connect( HOST, USERNAME, PASSWORD) or die("Could not connect");
  mysql_select_db (DATABASE)or die('Cannot connect to the database because: ' . mysql_error());
  mysql_query("SET NAMES 'utf8'");
?>
