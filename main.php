<?php
session_start();
$c = mysqli_connect("localhost","root","","robotics");
?>
<div id="result" style="display:none"><?php
if (isset($_POST["name"])&&isset($_POST["password"])) {
	$q = "SELECT user_salt, user_password FROM users WHERE user_name='".addslashes($_POST["name"])."'";
	$r = mysqli_query($c,$q);
	$a = mysqli_fetch_assoc($r);
	if ($a!=null) {
		if (md5($_POST["password"].$a["user_salt"])==$a["user_password"]) {
			echo addslashes($_POST["name"]);
			$_SESSION["user"] = addslashes($_POST["name"]);
		}
	}
}
else if (isset($_GET["logout"])) {
	session_unset();
	session_destroy();
}
?></div>
If you are reading this, <i>something messed up!</i><br><br>Please <a href="./">click here</a>.
<script>
top.ajax.doneLoading();
</script>