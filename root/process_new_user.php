<?php

include "db_connect.php";
$new_username = addslashes($_POST['username']);
$new_password1= addslashes($_POST['password1']);
$new_password2= addslashes($_POST['password2']);

$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

echo "<h2>Trying to add a new user ". $new_username . " pw = " . $new_password1 . " and " .$new_password2. "</h2>";

//password security requirements

if($new_password1 != $new_password2){
	echo "Passwords do not match. Try again.";
	exit;
}

preg_match('/[0-9]+/',$new_password1, $matches);
if (sizeof($matches) == 0){
	echo "The password must have at least one number <br>";
	exit;
}

preg_match('/[!@#$%^&*()]+/',$new_password1, $matches);
if(sizeof($matches) ==0){
	echo "The password must have at least one special character like: !@#$%^&*() <br>";
	exit;
}

preg_match('/[A-Z]+/',$new_password1, $matches);
if(sizeof($matches) ==0){
	echo "The password must have at least one upper case letter <br>";
	exit;
}

if(strlen($new_password1) <=8 ){
	echo "The password must be at least 8 characters long <br>";
	exit;
}




//check to see if user exisits
$sql = "SELECT * FROM users WHERE username='$new_username'";
$result = $mysqli->query($sql) or die (mysqli_error($mysqli));

if($result -> num_rows > 0){
	//username is taken
	echo "The username ".$new_username . " is taken. Please choose a different username.";
	exit;
}


//insert a new user
//$sql = " INSERT INTO users (id, username, password) VALUES (null, '$new_username', '$hashed_password')";
//$result = $mysqli -> query($sql) or die (mysqli_error($mysqli));
$stmt = $mysqli->prepare(" INSERT INTO users (id, username, password) VALUES (null, ?, ?)");
$stmt->bind_param("ss", $new_username, $hashed_password);
$result = $stmt->execute();



//error checking
if ($result){
	echo "Registration success<br>";
}
else{
	echo "Something went wrong. Not registered.";
}

echo "<a href = 'index.php'>Return to main </a>";

?>