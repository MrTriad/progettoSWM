<?php

session_start();

if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
	$username=$_COOKIE['username'];
	$password=$_COOKIE['password'];
}


if(!empty($_GET["username"])){

	if(isset($_COOKIE['username'])){

		echo('
		<p>ERROR ERROR You can\'t create an account for: '.$_GET['username'].' as you already own one</p>
		<p>Here it\'s not safe to talk. Return to the <a href="/XSS/XSS1.php">SAFE AREA</a> </p>
		');
		die();
	}


  $username = $_GET["username"];
	$length=15;
	$password=substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);

	setcookie('username', $username, time() + (86400 * 30), "/XSS/XSS1.php");
	setcookie('password', $password, time() + (86400 * 30), "/XSS/XSS1.php");
  
  
}else if(!empty($_POST["reset"])){
  
	unset($_COOKIE['username']);
	setcookie('username', null, -1, '/XSS/XSS1.php'); 
	unset($_COOKIE['password']);
	setcookie('password', null, -1, '/XSS/XSS1.php'); 
	$username="";
	$password="";

}

?>





<!DOCTYPE html>
<html lang="it">
<head>
  <title>XSS 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap4-neon-glow.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
   if(!empty($username)&&!empty($password)){
		
    echo('<div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
    <div class="col-sm-10">
      <h4 class="display-3" class="alert-heading">You got an account. Now try to get mine</h4>
      <p class="lead">Reset the page if you want to restart or return home</p>
    </div>
    <div class="col-sm-1">
      <form action="/XSS/XSS1.php" method="post">
        <input type="hidden" name="reset" value=\'1\'>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Reset</button>
        </div>
      </form>
    </div>
    <div class="col-sm-1">
      <form action="/index.php" method="get">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Home</button>
        </div>
      </form>
    </div>
    </div>
  </div>
	
	<div class="jumbotron" style="margin-top:50px">
				<p class="lead">Username:'.$username.'</p> 
				<p class="lead">Password:'.$password.'</p> 
        <p class="lead">We saved the data in your cookies, so you don\'t have to remember it! Feel free to thank us avoiding risky links</p> 
			</div>
	');
  }else{
    echo('<div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
      <div class="col-sm-11">
        <h4 class="display-3" class="alert-heading">Basic reflected XSS</h4>
        <p class="lead">Create a malicious link and steal some juicy data</p>
      </div>
      <div class="col-sm-1">
        <form action="/index.php" method="get">
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Home</button>
          </div>
        </form>
      </div>
    </div>
  </div>
	
	<div class="container" style="margin-top:30px">
			<h1>Secure credential generator</h1>
			
			<div class="row">
				<div class="col-sm-12 ">
					<p class="lead">Get your special alpha credential, right here right now</p>
					
					<form action="/XSS/XSS1.php" method="get">
						<div class="form-group">
							<label for="Usarname">Username:</label>
							<input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-primary">Generate</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	');
  }
?>


</body>
</html>
