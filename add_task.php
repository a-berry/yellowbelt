<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Add Task</title>
  <style type="text/css" media="all">@import "style.css";</style>
</head>
<body>
<h1>Add Task</h1>      
<?php # add_employee.php

// Include the database connection script:
require_once('mysql.inc.php');

// Array for handling errors:
$errors = array();
  
// Validate the required data;
if (!empty($_POST['first_name'])) {
  $fn = mysql_real_escape_string($_POST['first_name'], $dbc);
} else {
  $errors[] = 'first name';
}

if (!empty($_POST['last_name'])) {
  $ln = mysql_real_escape_string($_POST['last_name'], $dbc);
} else {
  $errors[] = 'last name';
}

// EMAIL CHECK
// check if the email field is not empty
if (!empty($_POST['email'])) {
  $e = mysql_real_escape_string($_POST['email'], $dbc);
} else {
  $error = true;
  $data = 'email error';
}

if (isset($_POST['department_id']) && is_numeric($_POST['department_id']) && ($_POST['department_id'] > 0))

{

  $did = (int) $_POST['department_id'];

} else {

  $errors[] = 'department';

}

if (isset($_POST['phone_ext']) && is_numeric($_POST['phone_ext']) && ($_POST['phone_ext'] > 0)) {

  $ext = (int) $_POST['phone_ext'];

} else {

  $errors[] = 'phone extension';

}

if (!$errors) { // If no errors, add the task.

  // Run the query:
  $q = "INSERT INTO employees VALUES (NULL, $did, '$fn', '$ln', '$e', $ext)";

  $r = mysql_query($q, $dbc);
  
  // Check that the query worked:
  if (mysql_affected_rows($dbc) == 1) {
  
    echo '<p><strong>The task has been added.</strong></p>';
      
  } else { // Query failure.
    echo '<p class="error">The task could not be added due to a system error.</p>';
  }

} else { // Errors!
  echo '<p>The following errors occurred:</p><ul class="error">';
  
  // Print each error:
  foreach ($errors as $e) {
    echo "<li>Please enter a valid $e.</li>\n";
  }
  
  echo '</ul>';
  
}

// Close the database connection.
mysql_close($dbc);

?>
</body>
</html>
