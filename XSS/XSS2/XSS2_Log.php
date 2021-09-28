<?php

session_start();

if (isset($_GET["user"])) {

	if($_GET["user"]){
		$_SESSION["XSS2_username"] = 'Eve';
	}else{
		$_SESSION["XSS2_username"] = 'Alice';
	}
	header("location: /progettoSWM/XSS/XSS2/XSS2_Blog.php");

}else if(isset($_SESSION["XSS2_username"])){
	header("location: /progettoSWM/XSS/XSS2/XSS2_Blog.php");
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

	<div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
      <div class="col-sm-11">
        <h4 class="display-3" class="alert-heading">Basic stored XSS</h4>
        <p class="lead">Exploit a voulnerable XSS blog</p>
      </div>
      <div class="col-sm-1">
        <form action="/progettoSWM/index.php" method="get">
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Home</button>
          </div>
        </form>
      </div>
    </div>
  </div>


	<div class="container" style="margin-top:30px">
		<h3>Log with both the users in different sessions and try to get steal Alice name as Eve.</h3>



		<div class="row">
			
				<div class="col-sm-6 ">
				<div class="ht-tm-element card text-white mb-3 text-center">
					<div class="card-body">
						<p class="lead">Login as Alice and chat like the good user you are</p>
						<form action="/progettoSWM/XSS/XSS2/XSS2_Log.php" method="get">
							<div class="form-group">
								<input type="hidden" name="user" value="0">
								<div class="d-flex justify-content-center">
									<button type="submit" class="btn btn-primary">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6 ">
			<div class="ht-tm-element card text-white mb-3 text-center">
				
					<div class="card-body">
						<p class="lead">Login as Eve and try to send a message as Alice. After alle being EVil is funnier</p>
						<form action="/progettoSWM/XSS/XSS2/XSS2_Log.php" method="get">
							<div class="form-group">
								<input type="hidden" name="user" value="1">
								<div class="d-flex justify-content-center">
									<button type="submit" class="btn btn-primary">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>