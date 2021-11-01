<head>
<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];

echo "You attempted login with " .$username . " and " .$password;

$stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

$stmt->execute();
$stmt->store_result();

$stmt->bind_results($userid, $uname, $pw);

//search database for the user
//$sql = "SELECT id, username, password FROM users WHERE username = '$username' AND password = '$password'";

echo "SQL = ". $sql . "<br>";

$result = $mysqli->query($sql);
echo "<pre>";
print_r($result);
echo "</pre>";

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$userid = $row['id'];
	echo "Login Successful!<br>";
	$_SESSION['username'] = $username;
	$_SESSION['userid'] = $userid;
	echo "<br><a href = 'index.php'> Return to main </a>";
	
	echo "<div>";
  }
  else {
	  echo "User not found";
	  $_SESSION = [];
	  session_destroy();
	  echo "<br><a href = 'login_form.php'> Return to login </a>";
  }
  
  echo "SESSION = <br>";
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
  
  
 ?>
