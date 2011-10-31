<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />  
  <title>Search for Tasks</title>
  <?php include("meta_head.php"); ?>
<script src="search.js" type="text/javascript"></script>
</head>
<body>
 <?php include("van.php"); ?>
<h3>search</h3>
<!-- search_form.html -->
<form action="search_results.php" method="get" id="search_form">
<p><input name="last_name" id="last_name" type="text" size="5" maxlength="30" />
<input name="go" type="submit" value="GO" />
</p>
</form>

<div id="results"></div>

<div id="debug"></div>

</body>
</html>
