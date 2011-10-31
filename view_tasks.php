<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Add Task</title>
  <style type="text/css" media="all">@import "style.css";</style>
</head>
<body>
<h1>View Task</h1>      
<?php # add_employee.php
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
    
      echo "<p><span class=\"name\">{$row['last_name']}, {$row['first_name']}</span><br />
      <strong>Email</strong>: {$row['email']}<br />
      <strong>Phone Extension</strong>: {$row['phone_ext']}
      </p>\n";
      
    } // End of WHILE loop.
  
  } else { // No employees.
    echo '<p class="error">There are no employees listed for the given department.</p>';
  }
  
  mysql_close($dbc);

} else { // Invalid department ID!
  echo '<p class="error">Please select a valid department from the drop-down menu in order to view its employees.</p>';
}


?>
</body>
</html>
