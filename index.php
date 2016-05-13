<?php
session_start();
$c = mysqli_connect("localhost","root","","robotics");
if (!isset($_GET["pg"])) {
	$_GET["pg"] = "home";
}
else if (!in_array($_GET["pg"],Array("home","account","contact","events","forum","about", "gallery"))) {
	$_GET["pg"] = "error";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<script src="main.js"></script>
<title>Robotics - <?=ucfirst($_GET["pg"])?></title>
</head>
<body>
<iframe id="ajax"></iframe>
<div id="header">
<ul>
	<li>Home</li>
	<li>About</li>
	<li>Forum</li>
	<li>Calendar</li>
	<li>Contact</li>
	<li class="right" onclick="toggleAccount();">Account</li>
</ul>
</div>
<div id="login">
	<?php
	if (!isset($_SESSION["user"])) {
		?>
		<div id="first">
			<div style="text-align:center"><span style="font-size:20px;">Welcome Back!</span><br><span id="loginerror">Please log in:</span><br><br>
			<i class="fa fa-user fa-fw"></i>&emsp;<input type="text" id="username" placeholder="Username"><br><br>
			<i class="fa fa-key fa-fw"></i>&emsp;<input type="password" id="password" placeholder="Password"><br><br>
			<button onclick="ajax.doAfter='runLogin()';ajax.request({'name':$('username').value,'password':$('password').value},'post')">Submit!</button><br><br><small class="link" onclick="$('first').style.display='none';$('second').style.display='block';">Help!</small>
			</div>
		</div>
		<div id="second" style="display:none">
			<i class="fa fa-arrow-left" style="cursor:pointer;" onclick="$('first').style.display='block';$('second').style.display='none';"></i><br><br>If you are part of the Onslow College robotics club and either do not have a login or have forgotten your password, please contact Orlando!<br><br><a href="mailto:lordorlando2001@gmail.com" target="_blank">lordorlando2001@gmail.com</a>
		</div>
		<?php
	}
	else {
		?>
		<span class="link" onclick="ajax.doAfter='window.location.reload()';ajax.request({'logout':''},'get')">Log Out</span>
		<?php	
	}
	?>
</div>
<br><br>
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