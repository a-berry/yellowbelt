<?php # mysql.inc.php

// This file establishes a connection to MySQL 
// and selects the database.

// Connect to MySQL:
$dbc = @mysql_connect ('localhost', 'root', 'password');

// Confirm the connection and select the database:
if (!$dbc OR !mysql_select_db ('db_name')) {
  
  // Handle the error, if desired.
  
  // Print a message to the user, complete the page, and kill the script.
  echo '<p class="error">The site is currently experiencing technical difficulties. We apologize for any inconvenience.</p>';
  exit();

} 
?>