<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap4-neon-glow.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1 class="display-3">Training SWM</h1>
  <p class="lead">Analisi di diversi tipi di attacco web</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row" >
    <div class="col-sm-12">
      <h2>SQLi</h2>
      <div class="row" style="margin-top:10px">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
            <span class="badge badge-primary">Pill Badge</span>
              <span class="badge badge-primary">Pill Badge</span>
              <h4 class="card-title" style="margin-top: 10px;">Basic log in vulnerability</h4>
              
              <p class="card-text">Try to log in with the oldest trick in the book</p>
              <a href="/SQLi/SQLi1.php" class="btn btn-primary">SQLi1</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">UNION SQLi</h5>
              <p class="card-text">Some bad guys sells malwares on the web, try to get their log in credential as payback</p>
              <a href="/SQLi/SQLi2.php" class="btn btn-primary">SQLi2</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">BLIND SQLi</h5>
              <p class="card-text">The bad guys really didn't appreciated the last attack. They're back, but their database should be afraid of snakes.</p>
              <a href="/SQLi/SQLi3.php" class="btn btn-primary">SQLi3</a>
            </div>
          </div>
        </div>
      </div>
      
      <h2 style="margin-top:20px">XSS</h2>
      <div class="row" style="margin-top:10px">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Basic reflected XSS</h5>
              <p class="card-text">Create a malicious link and steal some juicy data</p>
              <a href="/XSS/XSS1.php" class="btn btn-primary">XSS1</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Basic stored XSS</h5>
              <p class="card-text">Try to make your damage permanent</p>
              <a href="/XSS/XSS2/XSS2_Log.php" class="btn btn-primary">XSS2</a>
            </div>
          </div>
        </div>
      </div>

      <h2 style="margin-top:20px">SSRF</h2>
      <div class="row" style="margin-top:10px">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Basic SSRF</h5>
              <p class="card-text">Create a malicious link and steal some juicy data</p>
              <a href="/SSRF/SSRF1/SSRF1.php" class="btn btn-primary">SSRF1</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0;margin-top:20px">
  <p>Made with php, bootstrap and love by Emanuele Brugnara</p>
</div>

</body>


</html>
