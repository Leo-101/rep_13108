<?php 


DEFINE ('DB_USER', 'omar');
DEFINE ('DB_PASSWORD', 'db@fall18');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_name', 'omar database');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_name);

	// initialize variable
	$salesperson_ID = "";
	$name= "";
        $contactNo = "";
	$people_assigned = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$salesperson_ID = $_POST['salesperson_ID'];
		$name= $_POST['name'];
		$contactNo = $_POST['contactNo'];
        $people_assigned = $_POST['people_assigned'];




		mysqli_query($db, "INSERT INTO salesperson_13108 VALUES ('$salesperson_ID', '$name', '$contactNo', '$people_assigned')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: salesperson_13108.php');
	}

	if (isset($_POST['update'])) {
		$salesperson_ID = $_POST['salesperson_ID'];
		$name = $_POST['name'];
		$contactNo = $_POST['contactNo'];
        $people_assigned = $_POST['people_assigned'];
		
		mysqli_query($db, "UPDATE salesperson_13108 SET salesperson_ID = '$salesperson_ID', name = '$name', contactNo = '$contactNo', people_assigned = '$people_assigned' WHERE salesperson_ID='$salesperson_ID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: salesperson_13108.php');
	}

if (isset($_GET['del'])) {
	$customerid = $_GET['del'];
	mysqli_query($db, "DELETE FROM salesperson_13108 WHERE salesperson_ID='$salesperson_ID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: salesperson_13108.php');
}


	$results = mysqli_query($db, "SELECT * FROM salesperson_13108");


?>