<?php

session_start();


function curl_get($url){   
    $defaults = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 8
    );
   
    $ch = curl_init();
    curl_setopt_array($ch, ($defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
    } 
?>


<!DOCTYPE html>
<html lang="it">
<head>
  <title>SSRF 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/bootstrap4-neon-glow.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


   <div class="ht-tm-element alert alert-primary" role="alert">
        <div class="row">
            <div class="col-sm-11">
                <h4 class="display-3" class="alert-heading">Basic SSRF</h4>
                <p class="lead">I placed a <a href="./secret">secret</a> in the same directory, try to reach it</p>
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
        <h1>CURLintator</h1>
        
        <div class="row">
            <div class="col-sm-12 ">
                <p class="lead">I discovered that curl is a great tool. Though it shouldn't be only mine. I want to share it with the whole world</p>
                
                <form action="/SSRF/SSRF1/SSRF1.php" method="get">
                    <div class="form-group">
                        <label for="url">URL to curl:</label>
                        <input type="url" class="form-control" id="url" placeholder="https://example.com" name="url">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">CURL!</button>
                    </div>
                </form>
                <?php
                    if(!empty($_GET["url"])){
                        $url = $_GET["url"];
                        
                    
                        $urlToTest = parse_url($url);
                        
                        #https://book.hacktricks.xyz/pentesting-web/ssrf-server-side-request-forgery
                        $test = array("127", 'localhost', '2130706433', '017700000001', '3232235521', '3232235777', '172.16.238.10');
                        
                    
                        for ($i=0; $i < count($test); $i++) { 
                            if(str_starts_with($urlToTest['host'],$test[$i])){
                                echo('
                                <p>ERROR ERROR This great tool isn\'t made for bad guys like you</p>
                                ');
                                die();
                            }
                        }
                        
                        echo('<p>'.htmlspecialchars(curl_get($url)).'</p>');
                    }


                    
                    #echo(htmlentities(passthru('curl '.$url,$retval)));
                ?>
            </div>
        </div>
    </div>


</body>
</html>
