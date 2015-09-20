<?php
include_once '../includes/config.php';
  
try{
$pdoConnect = new PDO('mysql:host='.DB_HOST.';dbname'.DB_NAME.';charset=utf8',DB_USER,DB_PASSWORD);

echo 'Connected to Database';	
}catch(PDOException $e){
	echo $e->getMessage();
}
?>