<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script> 
  
  <style>
  *{
	  font-family:Arial, Helvetica, sans-serrif;
  }
  
  </style>
  

</head>

<?php

include "db_connect.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
$keywordfromform = addslashes($_GET['keyword']);
$keywordfromform = htmlspecialchars($keywordfromform);
$keywordfromform = "%" .$keywordfromform."%";

//search database for the keyword
echo "<h2>Show all jokes with the word ". $keywordfromform ."</h2>";
//$sql = "SELECT JokeID, Joke_question, Joke_answer, user_id, username FROM jokes_table JOIN users ON users.id = jokes_table.user_id WHERE Joke_question LIKE '%$keywordfromform%'";
$stmt = $mysqli->prepare("SELECT JokeID, Joke_question, Joke_answer, user_id, username FROM jokes_table JOIN users ON users.id = jokes_table.user_id WHERE Joke_question LIKE ?");
$stmt ->bind_param("s",$keywordfromform);

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($JokeID, $Joke_question, $Joke_answer, $userid, $username);

		
//echo "SQL statement = " .$sql . "<br>";

//each joke is on a newline
if ($stmt->num_rows > 0) {
  // output data of each row
 } else {
  echo "0 results";
  }
 ?>
 <div id="accordion">
 
 <?php
  while($stmt->fetch()) {
   // echo "id: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
  $safe_joke_question = htmlspecialchars($Joke_question);
  $safe_joke_answer = htmlspecialchars($Joke_answer);
  echo "<h3>".$safe_joke_question. "</h3>";
  echo "<div><p>" . $safe_joke_answer . " --submitted by user "  . $username. "</p></div>";	
  }

?>

</div>