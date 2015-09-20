<?php
DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD','turtledove');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','students');

  
try{
$pdoConnect = new PDO('mysql:host='.DB_HOST.';dbname'.DB_NAME.';charset=utf8',DB_USER,DB_PASSWORD);

echo 'Connected to Database';	
}catch(PDOException $e){
	echo $e->getMessage();
}
?>