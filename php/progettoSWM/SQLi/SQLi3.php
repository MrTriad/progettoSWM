<?php

session_start();



require('../backend/dbConnector.php');  
?>





<!DOCTYPE html>
<html lang="it">
<head>
  <title>SQLi 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap4-neon-glow.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="ht-tm-element alert alert-primary" role="alert">
    <div class="row">
      <div class="col-sm-11">
        <h4 class="display-3" class="alert-heading">BLIND Content-based SQLi</h4>
        <p class="lead">The bad guys decided to hide the list to solve the problem</p>
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
        <h1>Great malware shop 2.0</h1>
        
        <div class="row">
            <div class="col-sm-12 ">
                <p>Sadly someone decided to attack the old website. We had to remove the db display, tho now you can check if a product is still available searching for his ID. We're sure that our customers remembers the ID of all our products. Anyway the problem will be fixed as soon as possible</p>
                <p class="lead">1f y0u 423 7h3 h4ck32. We upgraded the database from the old SQLi2_Credential to the new powerful SQLi3_Credential. Now our password are strong and hidden. Good luck</p>
                <p>-BigBadGuy</p>
                
                <form action="/SQLi/SQLi3.php" method="get">
								
                    <div class="form-group">
                        <label for="ID">Item ID:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter item ID" name="ID">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
						
					
        </div>
            

				

        <?php
            if(!empty($_GET['ID'])){
                $query = "SELECT * FROM SQLi2_Items WHERE ID = '".$_GET['ID']."';";
            }else{
                $query = "SELECT * FROM SQLi2_Items;";
            }
            $result = $db->query($query);

            if($result->num_rows>=1){
              echo('
              <div class="alert alert-success" role="alert" style="margin-top:10px;">
                <strong>We got you covered!</strong> The item is still available.
              </div>
              ');
            }else{
              echo('
              <div class="alert alert-danger" role="alert" style="margin-top:10px;">
                <strong>We\'re sorry.</strong> The item is no more available in our store.
              </div>
              ');
            }
        ?>



</body>
</html>
