<?php
include_once 'includes/constants.php';

  
try{
$pdoConnect = new PDO('mysql:host='.DB_HOST.';dbname='.PDODB_NAME.';charset=utf8',DB_USER,DB_PASSWORD);
$pdoConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



$pdoConnect->beginTransaction();

 /***  INSERT statements ***/
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('emu', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('funnel web', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('lizard', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('dingo', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('kangaroo', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('wallaby', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('wombat', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('koala', 'bruce')");
    $pdoConnect->exec("INSERT INTO animals (animal_type, animal_name) VALUES ('kiwi', 'bruce')");
echo 'inserted values into Animals table';	
    /*** commit the transaction ***/
    $pdoConnect->commit();

}catch (PDOException $e)
{
	$pdoConnect->rollback();
	
	echo $e->getMessage();
}
?>
