<?php

 session_start();
 require_once 'classes/Shortener.php';


 $s = new Shortener();


 if (isset($_POST['url']) && !empty($_POST['url'])) {
  	
  	 $url = $_POST['url'];

  	 if ($code = $s->makecode($url)) {
  	 
  	     $_SESSION['feedback'] = "Generated! Your short url is <a style =\" color: #ffffff; \" href=\"http://localhost/urlshortener/{$code}\">http://localhost/urlshortener/{$code}</a>";
  	 }
  	  else{
  	  	$_SESSION['feedback'] = "There was a problem! Invalid Url perhaps";
  	  }
  } 


header('Location: index.php');

?>