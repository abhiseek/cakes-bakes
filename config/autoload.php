<?php 

//your project path goes here
define("BASE_URL","http://localhost/cakes&bakes/");
define("BASE_PATH","c:vault/WAMP/www/cakes&bakes/");

//set your timezone here
date_default_timezone_set('asia/kolkata');

 session_start();
 require(BASE_PATH.'config/database.php'); 
 require( BASE_PATH .'classes/database.php'); 
 require( BASE_PATH .'classes/FormAssist.class.php'); 
 require(BASE_PATH.'classes/FormValidator.class.php'); 
 require( BASE_PATH .'classes/DataAccess.class.php');
 
?>    