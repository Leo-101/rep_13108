<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_password', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'omar database');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_password, DB_NAME);

	// initialize variable
	$user_ID = "";
	$password= "";
        $status = "";
	$salesperson_ID = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$user_ID = $_POST['user_ID'];
		$password= $_POST['password'];
		$status = $_POST['status'];
        $salesperson_ID = $_POST['salesperson_ID'];




		mysqli_query($db, "INSERT INTO user_13108 VALUES ('$user_ID', '$password', '$status', '$salesperson_ID')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: users_13108.php');
	}

	if (isset($_POST['update'])) {
		$user_ID = $_POST['user_ID'];
		$password = $_POST['password'];
		$status = $_POST['status'];
        $salesperson_ID = $_POST['salesperson_ID'];
		
		mysqli_query($db, "UPDATE user_13108 SET user_ID = '$user_ID', password = '$password', status = '$status', salesperson_ID = '$salesperson_ID' WHERE user_ID='$user_ID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: users_13108.php');
	}

if (isset($_GET['del'])) {
	$user_ID = $_GET['del'];
	mysqli_query($db, "DELETE FROM user_13108 WHERE user_ID='$user_ID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: users_13108.php');
}


	$results = mysqli_query($db, "SELECT * FROM user_13108");


?>