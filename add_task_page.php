<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
<title>Search for Tasks</title>
<?php include("meta_head.php"); ?>
<script src="add_task.js" type="text/javascript"></script>
</head>
<body>
<?php include("van.php"); ?>
<!-- add_employee.html -->
<h3>Add TASKS:</h3>

<form action="add_task.php" method="post" id="emp_form">
<p><label class="title" id="first_name_label">task name <input type="text" id="first_name" name="first_name" /></label> </p>
<p><label class="title" id="last_name_label">task name 2 <input type="text" id="last_name" name="last_name" /></label> </p>
<p><label class="title" id="email_label">Email Address <input type="text" id="email" name="email" /></label> </p>
<p><label class="title" id="department_id_label">Context <select id="department_id" name="department_id">
  <option value="1">At Work</option>
  <option value="2">On the GO</option>
  <option value="3">Zen</option>
  <option value="4">Waiting</option>
</select></label> </p>
<p><label class="title" id="phone_ext_label">task number <input type="text" id="phone_ext" name="phone_ext" /></label> </p>

<p><input name="add" type="submit" value="Add" /></p>

</form>

<div id="results"></div>

debg:
<div id="debug"></div>

</body>
</html>
