<?php
session_start();
$c = mysqli_connect("localhost","root","","robotics");
if (!isset($_GET["pg"])) {
	$_GET["pg"] = "home";
}
else if (!in_array($_GET["pg"],Array("home","account","contact","events","fourm","about"))) {
	$_GET["pg"] = "error";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
<link rel="stylesheet" type="text/css" href="main.css">
<title>Robotics - <?=ucfirst($_GET["pg"])?></title>
</head>
<body>
<div id="header">
<ul>
	<li>Home</li>
	<li>About</li>
	<li>Forum</li>
	<li>Calendar</li>
	<li>Contact</li>
</ul>
</div><br><br>
<div id="main">
<?php
include("pgs/".$_GET["pg"].".php");
?>
</div>
<div id="footer">
&copy; Orlando Parisblue & Sam Griffen <?=date("Y");?>
</div>
</body>
</html>