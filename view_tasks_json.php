<?php # add_employee_xml.php
header("Content-Type: application/json");

// Validate the received department ID:
$did = 0; // Initialized value.

if (isset($_GET['did'])) { // Received by the page.
  $did = (int) $_GET['did']; // Type-cast to int.
}

// Make sure the department ID is a positive integer:
if ($did > 0) {

  // Get the employees from the database...
 
  // Include the database connection script:
  require_once('mysql.inc.php');
  
  // Query the database:
  $q = "SELECT * FROM employees WHERE department_id=$did ORDER BY last_name, first_name";
  $r = mysql_query($q, $dbc);
  
  // Check that some results were returned:
  if (mysql_num_rows($r) > 0) {
  
    // Retrieve the results:
    while ($row = mysql_fetch_array($r, MYSQL_ASSOC)) {
    
      echo "{$row['last_name']}<br />
      {$row['first_name']}<br />
      {$row['email']}<br />
      {$row['phone_ext']}<br />
      <hr />";
      
    } // End of WHILE loop.
  
  } else { // No employees.
    echo 'There are no tasks for that context';
  }
  
  mysql_close($dbc);

} else { // Invalid department ID!
  echo '<p class="error">Please select a valid context from the drop-down menu in order to view its tasks.</p>';
}


// Print the JSON data:
echo json_encode((array)$data) . "\n";

mysql_close($dbc);

?>
