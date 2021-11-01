<?php

session_start();

if (! $_SESSION['username']){
	echo "Only logged in users may access this page.  Click <a href = 'login_form.php'> here</a> to login <br>";
	exit;

}

include "db_connect.php";

$new_joke_question = addslashes($_GET["newjoke"]);
$new_joke_answer = addslashes($_GET["newanswer"]);
$userid = $_SESSION['userid'];

$new_joke_question = htmlspecialchars($new_joke_question);
$new_joke_answer = htmlspecialchars($new_joke_answer);


//add user joke to SQL table
echo "<h2>Trying to add new joke: $new_joke_question and $new_joke_answer </h2>";

//$sql = "INSERT INTO jokes_table (JokeID, Joke_question, Joke_answer, user_id) VALUES (NULL, '$new_joke_question', '$new_joke_answer', '$userid')";
//$result = $mysqli->query($sql) or die(mysqli_error($mysqli));
$stmt = $mysqli->prepare("INSERT INTO jokes_table (JokeID, Joke_question, Joke_answer, user_id) VALUES (NULL, ?, ?, ?)");
$stmt ->bind_param("ssi",$new_joke_question, $new_joke_answer, $userid);


$stmt->execute();
$stmt->close();

include "all_jokes.php";

?>

<a href = "index.php">Return to main page</a>