<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Search for Tasks</title>
  <style type="text/css" media="all">@import "style.css";</style>
</head>
<body>
<h1>Search Results</h1>      
<?php # search_results.php

// Validate the received last name:
if (!empty($_GET['last_name'])) {

  // Get the employees from the database...
 
  // Include the database connection script:
  require_once('mysql.inc.php');
  
  // Query the database:
  $q = "SELECT CONCAT(last_name, ', ', first_name), email, department FROM employees LEFT JOIN departments USING (department_id) WHERE last_name LIKE '" . mysql_real_escape_string($_GET['last_name']) . "%' ORDER BY last_name, first_name";
  $r = mysql_query($q, $dbc);
  
  // Check that some results were returned:
  if (mysql_num_rows($r) > 0) {
  
    // Retrieve the results:
    while ($row = mysql_fetch_array($r, MYSQL_NUM)) {
    
      echo "<p><span class=\"name\">$row[0]</span><br />   
      <strong>Department</strong>: $row[2]<br />
      <a href=\"mailto:$row[1]\">$row[1]</a>
      </p>\n";
      
    } // End of WHILE loop.
  
  } else { // No employees.
    echo '<p class="error">No dice.</p>';
  }

  // Close the database connection.
  mysql_close($dbc);

} else { // Invalid form data!
  echo '<p class="error">Please enter at least a couple of characters in the search</p>';
}

?>
</body>
</html>
