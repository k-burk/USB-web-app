<?php
//opening database with error check
if($mysqli->connect_errno){
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}

echo $mysqli->host_info . "<br>";

$sql = "SELECT JokeID, Joke_question, Joke_answer, user_id FROM jokes_table";
$result = $mysqli->query($sql);

//each joke is on a newline
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
	
	echo "<div><p> Submitted by user # "  . $row["user_id"]. "</p></div>";
  }
} else {
  echo "0 results";
}

?>
