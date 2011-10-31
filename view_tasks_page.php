<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
<title>Search for Tasks</title>
<?php include("meta_head.php"); ?>
<script src="view_tasks.js" type="text/javascript"></script>
</head>
<body>
<?php include("van.php"); ?>
<!-- add_employee.html -->
<h3>viw TASKS:</h3>

<p>Select a context to view tasks to complete.</p>
<form action="view_tasks.php" method="get" id="view_tasks">
<p>
    <h3>contexts</h3>
<select id="did" name="did">
<option value="1">At WOrk</option>
<option value="2">on go</option>
<option value="3">zen</option>
<option value="4">waiting</option>
</select>
<input name="go" type="submit" value="GO" />
</p>
</form>

<div id="results"></div>

</body>
</html>
