<?php 


DEFINE ('DB_USER', 'omar');
DEFINE ('DB_PASSWORD', 'db@fall18');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_name', 'omar database');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_name);

	// initialize variable
		
		$name= "";
        $contactNo = "";
		$people_assigned = "";
	    $salesperson_ID = "";
		$id = 0;
	    $update = false;

	if (isset($_POST['save'])) {

		
		$name= $_POST['name'];
		$contactNo = $_POST['contactNo'];
        $people_assigned = $_POST['people_assigned'];
        $salesperson_ID = $_POST['salesperson_ID'];



		mysqli_query($db, "INSERT INTO salesperson_13108 VALUES ('$name', '$contactNo', '$people_assigned', '$salesperson_ID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: salesperson_13108.php');
	}

	if (isset($_POST['update'])) {
		
		$name = $_POST['name'];
		$contactNo = $_POST['contactNo'];
        $people_assigned = $_POST['people_assigned'];
		$salesperson_ID = $_POST['salesperson_ID'];
		
		mysqli_query($db, "UPDATE salesperson_13108 SET name = '$name', contactNo = '$contactNo', people_assigned = '$people_assigned', salesperson_ID = '$salesperson_ID' WHERE salesperson_ID='$salesperson_ID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: salesperson_13108.php');
	}

if (isset($_GET['del'])) {
	$salesperson_ID = $_GET['del'];
	mysqli_query($db, "DELETE FROM salesperson_13108 WHERE salesperson_ID='$salesperson_ID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: salesperson_13108.php');
}


	$results = mysqli_query($db, "SELECT * FROM salesperson_13108");


?>