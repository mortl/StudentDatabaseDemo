<?php 
/*opens a connection to the database
this file should be saved outside the web document folder.

*/


include_once 'includes/constants.php';
$dbc = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,ST_DB_NAME)
    OR die('Could not connect to MySQL: ' . mysqli_connect_error());
?>