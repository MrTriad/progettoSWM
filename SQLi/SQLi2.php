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
        <h4 class="display-3" class="alert-heading">UNION SQLi</h4>
        <p class="lead">Some bad guys sells malwares on the web, try to get their log in credential as payback</p>
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
        <h1>Great malware shop</h1>
        
        <div class="row">
            <div class="col-sm-12 ">
                <p class="lead">Steal everything from anyone, but please don't attack us</p>
                
                <form action="/progettoSWM/SQLi/SQLi2.php" method="get">
								
                    <div class="form-group">
                        <label for="name">Item name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter item name" name="name">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
						
					
        </div>
            

				<table class="table table-hover table-striped" style="margin-top: 20px;">
        <thead class="thead-dark">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>NumberSold</th>
            <th>Description</th>
            </tr>
        </thead>
				<tbody>

				<?php
					if(!empty($_GET['name'])){
						$query = "SELECT * FROM SQLi2_Items WHERE Name = '".$_GET['name']."';";
					}else{
						$query = "SELECT * FROM SQLi2_Items;";
					}
					$result = $db->query($query);

					while ($row = mysqli_fetch_assoc($result)) {
						echo('
						<tr>
						<th scope="row">'.$row['ID'].'</th>
						<td>'.$row['Name'].'</td>
						<td>'.$row['NSold'].'</td>
						<td>'.$row['Description'].'</td>
						</tr>
						');
					}
				?>

        </tbody>
        </table>
        </div>



</body>
</html>
