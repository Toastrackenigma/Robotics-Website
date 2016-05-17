<?php
$c = mysqli_connect("localhost","root","","robotics");
if (isset($_POST["user"])&&isset($_POST["pass"])) {
	$salt = "";
	for($i=0;$i<32;$i++) {
		$salt .= chr(rand(65,90));
	}
	$q = "INSERT INTO users(user_name,user_password,user_salt) VALUES('".addslashes($_POST["user"])."','".md5($_POST["pass"].$salt)."','$salt')";
	echo $q;
	mysqli_query($c,$q);
}
echo "<i>User setup successfully!</i>";
?>
<form method="post" action="adduser.php">
Username: <input type="text" name="user"><br>
Password: <input type="password" name="pass"><br>
<button>Submit</button>
</form>