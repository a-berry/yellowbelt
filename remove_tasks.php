<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
<title>Remove Tasks</title>
<?php include("meta_head.php"); ?>
</head>
<body>
<h1>Remove Tasks</h1>
<?php 

// Validate the received department ID:
$did = 0; // Initialized value.

if (isset($_GET['did'])) { // Received by the page.
  $did = (int) $_GET['did']; // Type-cast to int.
}

// Make sure the department ID is a positive integer:
if ($did > 0) {

// Validate the received last name:

    // Include the database connection script:
    require_once('mysql.inc.php');

    $q = "DELETE 
          FROM employees 
          WHERE department_id=$did";

    $r = mysql_query($q, $dbc);

    // Check that some results were returned:
    if (mysql_num_rows($r) > 0) {

      echo '<p class="error"><i>something</i> happened to the DB, but what?</p>';

      echo '<p class="error">did value is:</p>' . $did;

      echo '<p class="error">query is:</p>' . $q;

    } else { // No employees.

      echo '<p class="error">Success. There are no items listed by id ' . $did . ', you must have blew them all away, nice job.</p>';

    }
    // Close the database connection.
    mysql_close($dbc);
    
} else { // Invalid department ID! (from if did is set check above)
  echo '<p class="error">Please select a valid id to remove.</p>';
    echo '<p class="error">did value is:</p>';
    echo $did;
}

?>
</body>
</html>
