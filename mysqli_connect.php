<?php 
/*opens a connection to the database
this file should be saved outside the web document folder.

*/


DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD','turtledove');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','students');

$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
    OR die('Could not connect to MySQL: ' . mysqli_connect_error());
?>