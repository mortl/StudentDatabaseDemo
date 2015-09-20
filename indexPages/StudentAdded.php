<html>
<head>
<title>Add Student</title>
<body>
<?php
//check to see if the submit button was pressed and collect the data from each field. 
if(isset($_POST['submit'])){

//store items in this array so we can keep track of what the user did not input.
$data_missing = array();

if(empty($_POST['first_name'])){		
		$data_missing [] = 'First Name';	
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$f_name = trim($_POST['first_name']);		
	}
	
	if(empty($_POST['last_name'])){		
		$data_missing [] = 'Last Name';		
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$l_name = trim($_POST['last_name']);		
	}
	
	if(empty($_POST['email'])){		
		$data_missing [] = 'Email';		
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$email = trim($_POST['email']);		
	}
	
	if(empty($_POST['street'])){
		$data_missing [] = 'Street';
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$street = trim($_POST['street']);
	}
	
	if(empty($_POST['city'])){
		$data_missing [] = 'City';		
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$city = trim($_POST['city']);
	}
	
	if(empty($_POST['state'])){
		$data_missing [] = 'State';
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$state = trim($_POST['state']);
	}
	
	if(empty($_POST['zip'])){
		$data_missing [] = 'Zip Code';
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$zip = trim($_POST['zip']);		
	}
	
	if(empty($_POST['phone'])){
		$data_missing [] = 'Phone Number';
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$phone = trim($_POST['phone']);
	}
	
	if (empty($_POST['birth_date'])) {
		$data_missing [] = 'Birth Date';
	}else{
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$b_date = trim($_POST['birth_date']);
	}
	
	if (empty($_POST['sex'])) {
		$data_missing [] = 'Sex';
	} else {
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$sex = trim($_POST['sex']);
	}
	
	if (empty($_POST['lunch'])) {
		$data_missing [] = 'Lunch Cost';
	} else {
		//Trim the white sapce from the item and store it in a variable.
		//TODO: make this more secure so we can avoid any sql injection/other attacks.
		$lunch = trim($_POST['lunch']);
	}
	
	
	/*If the data missing array is empty
	 * we can insert the data into the students table.
	 */
	if (empty($data_missing)) {
		 require_once('../mysqli_connect.php');
		
		//create the prepared statement for inserting the data into the database.
	$query = "INSERT INTO students(first_name,last_name,email,street,city,
			state,zip,phone,birth_date,sex,
			date_entered,lunch_cost,student_id) VALUES(?,?,?,?,?,?,?,?,?,?,NOW(),?,NULL)";
			
	$statement = mysqli_prepare($dbc, $query);
		   /*
			i Integers
			d Doubles
			b Blobs
			s Everything Else
			*/
	 mysqli_stmt_bind_param($statement, "ssssssisssd",$f_name,
			$l_name,$email,$street,$city,
			$state,$zip,$phone,$b_date,
			$sex,$lunch);
		
	mysqli_stmt_execute($statement);
	
	//this insert should only effect 1 row at a time, so we must check to see if any error occured.
	$affected_rows = mysqli_stmt_affected_rows($statement);
	
	if($affected_rows == 1){
		echo 'Student Entered';
		
		//close the statment and the database connection 
		mysqli_stmt_close($statement);
		mysqli_close($dbc);
	} else {
		//something wrong happened, print out the error message and close the connection/statement
		echo 'Error Occured <br/>';
		echo mysqli_error();
		
		mysqli_stmt_close($statement);
		mysqli_close($dbc);
		
	}
		
		
	} else {
		// print out what the user did not input into the form
		echo 'You need to enter the following data<br/>';
		
		foreach($data_missing as $missing){
			echo "$missing <br/>";
		}
	}
}

include 'addstudent.php'
?>




</body>
</head>
</html>