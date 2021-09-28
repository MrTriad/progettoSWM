<?php

session_start();




if(isset($_SESSION["XSS2_username"])){

  require('../../backend/dbConnector.php');  
  
  if(isset($_GET['post'])){

    $post=$_GET['post'];

    $stmt = $db->prepare(
    "INSERT INTO XSS2_Post (Username, Post)
    VALUES (?, ?);");
    $stmt->bind_param("ss", $_SESSION["XSS2_username"], $post);
    $stmt-> execute();
    $db -> close();
    header("location: /progettoSWM/XSS/XSS2/XSS2_Blog.php");
  }else if(isset($_GET['reset'])){
    unset($_SESSION["XSS2_username"]);
    $query = "DELETE FROM XSS2_Post WHERE Username = 'Alice' OR Username = 'Eve';";
    $db->query($query);
    header("location: /progettoSWM/XSS/XSS2/XSS2_Log.php");
  }
  
  
}else{
    
  header("location: /progettoSWM/XSS/XSS2/XSS2_Log.php");
}

?>


<!DOCTYPE html>
<html lang="it">
<head>
  <title>XSS 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/progettoSWM/css/bootstrap4-neon-glow.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  if($_SESSION["XSS2_username"]=='Alice'){
    echo('<div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
    <div class="col-sm-10">
      <h4 class="display-3" class="alert-heading">Enjoy this safe place Alice</h4>
      <p class="lead">We removed all the SQLi from here, so there\'s absolutely no danger</p>
    </div>
    <div class="col-sm-1">
      <form action="/progettoSWM/XSS/XSS2/XSS2_Blog.php" method="get">
        <input type="hidden" name="reset" value=\'1\'>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Reset</button>
        </div>
      </form>
    </div>
    <div class="col-sm-1">
      <form action="/progettoSWM/index.php" method="get">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Home</button>
        </div>
      </form>
    </div>
    </div>
  </div>');
  }else{
    echo('<div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
    <div class="col-sm-10">
      <h4 class="display-3" class="alert-heading">It\'time to steal some sessions Eve</h4>
      <p class="lead">Write a payload and make sure that the problem will persist >:3</p>
    </div>
    <div class="col-sm-1">
      <form action="/progettoSWM/XSS/XSS2/XSS2_Blog.php" method="get">
        <input type="hidden" name="reset" value=\'1\'>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Reset</button>
        </div>
      </form>
    </div>
    <div class="col-sm-1">
      <form action="/progettoSWM/index.php" method="get">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Home</button>
        </div>
      </form>
    </div>
    </div>
  </div>');
  }
?>

<div class="container" style="margin-top:30px">
  <div class="row">
		
		<ul class="list-group ht-tm-element w-100">
			
<?php
    $stmt = $db->prepare(
    "SELECT Username, Post, ID FROM XSS2_Post");
    $stmt-> execute();
    $result = $stmt-> get_result();

    while ($row = mysqli_fetch_assoc($result)) {
        echo('
				<li class="list-group-item p-2" style="margin-top:10px">
				<div class="col-sm-12">
					<h3>'.$row['Username'].'</h3>
					<p class="lead">'.$row['Post'].'</p>
				</div>
				</li>
				');
    }

    echo('
    <li class="list-group-item p-2" style="margin-top:10px">
				<div class="col-sm-12">
					<h3>'.$_SESSION["XSS2_username"].'</h3>
    ');
?>
      <form action="/progettoSWM/XSS/XSS2/XSS2_Blog.php" method="get" onsubmit="return superSecureXSSChecker()">
      <textarea name="post" class="form-control" id="post" rows="3"></textarea>
      <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
      </form>
    </div>
    </li>

			</ul>
		</div>
    
  </div>
</div>

<?php
$db -> close();
?>

</body>


<script>
  function superSecureXSSChecker(){
    if(document.getElementById('post').value.includes('<script>')){
      alert("0x90! I'll say it clearly in your 1337 language\nH4CK3r5 C4N7 P455 H3r3!");
      return false;
    }else{
      return true;
    }
  }
</script>
</html>
