<?php 


DEFINE ('DB_USER', 'omar');
DEFINE ('DB_PASSWORD', 'db@fall18');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'omar database');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variable
	$product_ID = "";
	$brand = "";
    $type = "";
	$shade = "";
	$size = "";
	$price = "";
	
	$update = false;

	if (isset($_POST['save'])) {

		$product_ID = $_POST['product_ID'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];
        $shade = $_POST['shade'];
		$size = $_POST['size'];
		$price = $_POST['price'];




		mysqli_query($db, "INSERT INTO product_13108 VALUES ('$product_ID', '$brand', '$type', '$shade','$size','$price')"); 
                
		$_SESSION['message'] = "SAVED!"; 
		header('location: product_13108.php');
	}

	if (isset($_POST['update'])) {
		$product_ID = $_POST['product_ID'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];
        $shade = $_POST['shade'];
		$size= $_POST['size'];
		$price = $_POST['price'];
		mysqli_query($db, "UPDATE product_13108 SET product_ID = '$product_ID', brand = '$brand', type = '$type', shade = '$shade',size = '$size',price = '$price', WHERE product_13108_ID='$product_13108_ID'");
		$_SESSION['message'] = "UPDATED"; 
		header('location: product_13108.php');
	}

if (isset($_GET['del'])) {
	$customerid = $_GET['del'];
	mysqli_query($db, "DELETE FROM product_13108 WHERE product_ID='$product_ID'");
	$_SESSION['message'] = "DELETED!"; 
	header('location: product_13108.php');
}


	$results = mysqli_query($db, "SELECT * FROM product_13108");


?>