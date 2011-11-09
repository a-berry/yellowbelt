<?php # add_employee_xml.php
header("Content-Type: application/json");

require_once('mysql.inc.php');

$error = false;

// Initialize a return var:
$data = array();

// Validate the received department ID:
$tid = 0; // Initialized value.

if (isset($_GET['tid'])) { // Received by the page.
  $tid = $_GET['tid'];
  $data[] = $tid . 'set win?';
} else {
  $data[] = $tid . 'set fail';
}

$data[] = $tid . ' tid val';

// Make sure the department ID is a positive integer:
if ($tid) {

// Validate the received last name:

    // Include the database connection script:
    require_once('mysql.inc.php');

    $q = "DELETE 
          FROM employees 
          WHERE email='$tid'";

    $r = mysql_query($q, $dbc);

    // Check that some results were returned:
    if (mysql_num_rows($r) > 0) {

      echo '<p class="error"><i>something</i> happened to the DB and was returned, but what?</p>';

      echo '<p class="error">did value is:</p>' . $tid;

      echo '<p class="error">query is:</p>' . $q;

    } else { // No employees.

      echo '<p class="error">Success. There are no items listed by id ' . $tid . ', you must have blew them all away, nice job.</p>';

      $data[] = 'win';

    }
    // Close the database connection.
    mysql_close($dbc);
    
} else { // Invalid department ID! (from if did is set check above)
  echo '<p class="error">Please select a valid id to remove.</p>';
    echo '<p class="error">did value is:</p>';
    echo $tid;
    $data[] = 'fail';
}

echo json_encode((array)$data) . "\n";

mysql_close($dbc);

?>
