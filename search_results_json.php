<?php # search_results_json.php
header("Content-Type: application/json");

// This page should receive a $_GET['last_name'] value.
// It sends data to search_json.js in JSON format.

// Validate the received last name:
if (!empty($_GET['last_name'])) {

  // Get the employees from the database...
 
  // Include the database connection script:
  require_once('mysql.inc.php');
  
  // Query the database:
  $q = "SELECT CONCAT(last_name, ', ', first_name), email, department 
        FROM employees 
        LEFT JOIN departments USING (department_id) 
        WHERE last_name LIKE '" . mysql_real_escape_string($_GET['last_name']) . "%' 
        ORDER BY last_name, first_name";
  $r = mysql_query($q, $dbc);
  
  // Check that some results were returned:
  if (mysql_num_rows($r) > 0) {
  
    // Initialize an array:
    $data = array();
  
    // Retrieve the results:
    while ($row = mysql_fetch_array($r, MYSQL_NUM)) {
    
      // Add to the array:
      $data[] = array ('name' => $row[0],
      'department' => $row[2],
      'email' => $row[1]);
              
    } // End of WHILE loop.
    
    // Print the JSON data:
    echo json_encode($data) . "\n";
    
  } 
  
  // Close the database connection.
  mysql_close($dbc);
  
} // End of $_GET['last_name'] IF.

?>