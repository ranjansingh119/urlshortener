<?php
  
session_start();

?>


<!DOCTYPE html>
<html ng-app="webapp">
  <head>
    <meta charset="UTF-8">
    <title>Shortening a Url.</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.10/angular.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.10/angular-route.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>

    <style type="text/css">


    body{

    background-color: #c0deed;       

    }


    .title{
      padding-top: 0%;
      padding-bottom: 4%;

    }

    .container{
     
    background-color: #007bb5;      
    margin-right: 40%;
    margin-left: 30%;
    padding-top: 5%;
    padding-bottom: 10%;  
    margin-top: 10%;
    border-radius: 30px;
    border-color: #007bb5;
    border-style: solid;
       
    }

    input{
      border-radius: 5px;
      
    }

    #url_display{
      padding-top: 2%;
    }

    </style>
  </head>
<body>
  
    <div navbar title="Stocky"></div>
        <div data-ng-view></div>

   <div class = "container">
 
    <h1 class="title"> Url Shortener</h1>

    

    <form action="shorten.php" method="post">
     <input type="url" name="url" autocomplete="off" placeholder="Enter a Url">
     <button type="submit" class="btn btn-success">Shorten</button>
    </form>

   <p id="url_display"> <?php

   if (isset($_SESSION['feedback'])) {
     
     echo "<p>{$_SESSION['feedback']}</p>";

     unset($_SESSION['feedback']);
   }


   ?></p>


   </div>

 
</body>
<script type="text/javascript" src="js/app_controller.js"></script>

</html>