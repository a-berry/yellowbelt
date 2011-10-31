<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
<title>Search for Tasks</title>
<?php include("meta_head.php"); ?>
<script src="remove_task.js" type="text/javascript"></script>
</head>
<body>
<?php include("van.php"); ?>
<!-- add_employee.html -->
<h3>Remove TASKS:</h3>


<h4>Remove all tasks by context:</h4>
<hr />
<form action="remove_task.php" method="get" id="remove_task_form">

this will delete all tasks by category
<br />
delete all work items by cat<br />

<p><label class="title" id="department_id_label">Context 
<select id="did" name="did">
  <option value="1">At Work</option>
  <option value="2">On the GO</option>
  <option value="3">Zen</option>
  <option value="4">Waiting</option>
</select></label> </p>

<p><input name="remove" type="submit" value="delete" /></p>

</form>

<div id="results"></div>

</body>
</html>
