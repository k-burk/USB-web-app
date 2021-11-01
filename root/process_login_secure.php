<head>
<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

//echo "You attempted login with " .$username . " and " .$password;

//search database for the user
$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($userid, $uname, $pw);

if($stmt->num_rows ==1){
	echo "i found one user";
	$stmt->fetch();
	if(password_verify($password, $pw)){
		echo"Login success<br>";
		$_SESSION['username'] = $uname;
		$_SESSION['userid'] = $userid;
		echo "<br><a href = 'index.php'> Return to main </a>";
		exit;
	}
	else{
		$_SESSION = [];
	  session_destroy();
	}
}
else{
	$_SESSION = [];
	  session_destroy();
}
echo "Login failed<br>";


  
  echo "SESSION = <br>";
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
  
  
 ?>
