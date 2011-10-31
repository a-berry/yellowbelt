<?php # add_employee_xml.php
header("Content-Type: application/json");

    require_once('mysql.inc.php');

    $error = false;

    // Initialize an array:
    $data = array();

    // FIRST NAME
    if (!empty($_POST['first_name'])) {

      $fn = mysql_real_escape_string($_POST['first_name'], $dbc);

    } else {

      $error = true;
      $data[] = 'first_name';

    }
    
    // LAST NAME
    if (!empty($_POST['last_name'])) {
      $ln = mysql_real_escape_string($_POST['last_name'], $dbc);

    } else {
      $error = true;
      $data[] = 'last_name';
    }
    
    // EMAIL CHECK
    // check if the email field is not empty
    // if (!empty($_POST['email'])) {
    if (!empty($_POST['email'])) {

        $e = mysql_real_escape_string($_POST['email'], $dbc);

    } else {

      $error = true;
      $data[] = 'email field error';
    }

    // task id check
    if (isset($_POST['department_id']) && is_numeric($_POST['department_id']) && ($_POST['department_id'] > 0)) {
    $did = (int) $_POST['department_id'];

    } else {
      $error = true;
      $data[] = 'department';
    }

    // NUMERIC PHONE FIELD
    if (isset($_POST['phone_ext']) && is_numeric($_POST['phone_ext']) && ($_POST['phone_ext'] > 0)) {
      $ext = (int) $_POST['phone_ext'];
    } else {
      $error = true;
      $data[] = 'phone_ext';
    }
    
    // CHECK ERROR ARRAY
    // (if there are no errors send the query)
    if (!$error) {

      $q = "INSERT INTO employees VALUES (NULL, $did, '$fn', '$ln', '$e', $ext)";

      $r = mysql_query($q, $dbc);
      
      // if the number of rows affected is 1
      if (mysql_affected_rows($dbc) == 1) {
      $data[] = " success db transaction : " . $q;
      
      } else { // Query failure.
      $data[] = 'fail, no database transaction';
      }

    // otherwis there were errors in the php collections
    // debug the collection scripts above
    } else { // Errors!

    
    $data[] = 'you effed up where its red (msg from add_task_json.php - form field process error)';

}

//RETURN
// Print the JSON data:
echo json_encode((array)$data) . "\n";

mysql_close($dbc);

?>
