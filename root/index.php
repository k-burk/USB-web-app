<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<h1>Jokes Page</h1>
<!-- <a href="logout.php">Click here to log out<a> -->
<a href="login_form.php">Click here to login<a>
<a href ="register_new_user.php">Click here to register<a><br>

<?php

include "db_connect.php";



//include "all_jokes.php";

?>


<form class="form-horizontal" action="search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search for a joke</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="keyword">Search Input</label>
  <div class="col-md-5">
    <input id="keyword" name="keyword" type="search" placeholder="e.g. chicken" class="form-control input-md" required="">
    <p class="help-block">Enter a word to search for in the joke table</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>



<hr>

<form class="form-horizontal"  action="add_joke.php">
<fieldset>

<!-- Form Name -->
<legend>Add a Joke</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newjoke">Enter your new joke</label>  
  <div class="col-md-5">
  <input id="newjoke" name="newjoke" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the first half of your new joke</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newanswer">The answer</label>  
  <div class="col-md-5">
  <input id="newanswer" name="newanswer" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">Enter the punchline to the joke</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Add New Joke</button>
  </div>
</div>

</fieldset>
</form>


<?php

//include "search_keyword.php";

$mysqli->close();

?>





</body>

</html>