<?php

class Shortener{

 protected $db;

 public function __construct(){

 	$this->db = new mysqli('localhost','root','ranjan','links');
 }
 
 protected function generateCode($num){
  
  return substr(md5($num), 0, 6);
 }


 public function makecode($url){
   
    $url = trim($url);

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
    	 return ' ';
    }

    $url = $this->db->escape_string($url);
    
    $exists = $this->db->query("SELECT code FROM links WHERE url = '{$url}' ");

    if($exists->num_rows){
       	return $exists->fetch_object()->code;
    }
     else{
        //Insert and store url and code...

      $insert = $this->db->query("INSERT INTO links(url, created) VALUES ('{$url}', NOW()) ");

      $code = $this->generateCode($this->db->insert_id);

      $this->db->query("UPDATE links SET code = '{$code}'  WHERE url = '{$url}' ");

      return $code;
     }

 }


 public function getUrl($code){

  $code = $this->db->escape_string($code); 

  $code = $this->db->query("SELECT url FROM links WHERE code = '$code' ");

  if ($code->num_rows) {
  
    return $code->fetch_object()->url;
  }

  else return ' ';
 }

}



?>