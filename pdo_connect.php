<?php
DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD','turtledove');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','students');

  
try{
$pdoConnect = new PDO('mysql:host=localhost;dbname=students',DB_USER,DB_PASSWORD);

echo 'Connected to Database';	
}catch(PDOException $e){
	echo $e->getMessage();
}
?>