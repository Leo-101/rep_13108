<?php 


DEFINE ('DB_USER', 'omar');
DEFINE ('DB_PASSWORD', 'db@fall18');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'omar database');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD , DB_NAME);

	// initialize variable
	$Customer_ID = "";
        $Name = "";
	$ContactNo = "";	
	$Address = "";
        $CNIC = "";        
	$Payment_Due = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {

				$Customer_ID = $_POST['Customer_ID'];
                $Name = $_POST['Name'];
				$ContactNo = $_POST['ContactNo'];                
				$Address = $_POST['Address'];
                $CNIC = $_POST['CNIC'];                
				$Payment_Due = $_POST['Payment_Due'];




		mysqli_query($db, "INSERT INTO customer_13108
			VALUES ('$Customer_ID', '$Name', '$ContactNo', '$Address', '$CNIC', 
			'$Payment_Due')"); 
                
		$_SESSION['message'] = "Entry SAVED!"; 
		header('location: index1.php');
	}

	if (isset($_POST['update'])) {
				$Customer_ID = $_POST['Customer_ID'];
                $Name = $_POST['Name'];
				$ContactNo = $_POST['ContactNo'];		
                $Address = $_POST['Address'];
                $CNIC = $_POST['CNIC'];		
				$Payment_Due = $_POST['Payment_Due'];
                
		mysqli_query($db, "UPDATE customer_13108 SET Customer_ID = '$Customer_ID', Name = '$Name', ContactNo = '$ContactNo', Address = '$Address', CNIC = '$CNIC', Payment_Due = '$Payment_Due' WHERE Customer_ID='$Customer_ID'");
		$_SESSION['message'] = "Entry UPDATED!"; 
		header('location: index1.php');
	}

if (isset($_GET['del'])) {
	$Customer_ID = $_GET['del'];
	mysqli_query($db, "DELETE FROM customer_13108 WHERE Customer_ID = $Customer_ID");
	$_SESSION['message'] = "Entry DELETED!"; 
	header('location: index1.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer_13108");


?>