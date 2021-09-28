<?php

session_start();



if(!empty($_GET["username"]) && !empty($_GET["password"]) && isset($_GET["secure"])){

  
  require('../backend/dbConnector.php');
  $username = $_GET["username"];
  $password = $_GET["password"];
  $secure = $_GET["secure"];
  
  if($secure){
    
    $stmt = $db->prepare(
      "SELECT Username FROM SQLi1
      WHERE Username=? AND Password=?;");

    $stmt->bind_param("ss", $username,$password);
    $stmt-> execute();
    $result = $stmt-> get_result();
    
  }else{
    $sql = "SELECT Username FROM SQLi1 WHERE Username='".$username."' AND Password='".$password."';";
    $result = $db->query($sql);
  }
  
  if ($result->num_rows==1) {
    //$result = $result->fetch_assoc();
    $_SESSION["SQLi1"] = TRUE;
  }

  $db -> close();
  
}else if(!empty($_GET["reset"])){
  $_SESSION['SQLi1']=FALSE;
}else{
    
    //header("location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="it">
<head>
  <title>SQLi 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap4-neon-glow.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  if(isset($_SESSION["SQLi1"]) && $_SESSION["SQLi1"]==TRUE){
    echo('<div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
    <div class="col-sm-10">
      <h4 class="display-3" class="alert-heading">You\'re IN!</h4>
      <p class="lead">Now you can reset and retry the page or return to the home ^^</p>
    </div>
    <div class="col-sm-1">
      <form action="/progettoSWM/SQLi/SQLi1.php" method="get">
        <input type="hidden" name="reset" value=\'1\'>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Reset</button>
        </div>
      </form>
    </div>
    <div class="col-sm-1">
      <form action="../index.php" method="get">
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
      <div class="col-sm-11">
        <h4 class="display-3" class="alert-heading">Basic log in vulnerability</h4>
        <p class="lead">Try to log in with the oldest trick in the book</p>
      </div>
      <div class="col-sm-1">
        <form action="../index.php" method="get">
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
    <div class="col-sm-6">
      <h2>Login form non sanitizzato</h2>
      <form action="/progettoSWM/SQLi/SQLi1.php" method="get">
        <div class="form-group">
          <label for="Usarname">Username:</label>
          <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <input type="hidden" name="secure" value='0'>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <div class="col-sm-6">
        <h2>Login form sanitizzato</h2>
        <form action="/progettoSWM/SQLi/SQLi1.php" method="get">
          <div class="form-group">
            <label for="Usarname">Username:</label>
            <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
          </div>
          <input type="hidden" name="secure" value='1'>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if(isset($sql)){
    echo('
      <div class="jumbotron" style="margin-top:50px">
        <h1 class="display-4">Query:</h1>
        <p class="lead">'.$sql.'</p> 
      </div>
    ');
  }
  ?>
</div>

</body>
</html>
