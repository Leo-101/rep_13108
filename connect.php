<?php
DEFINE ('DB_USER', 'omar');
DEFINE ('DB_PASSWORD', 'db@fall18');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'omar database');



	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$db){
    die("Database Connection Failed" . mysqli_error($db));
}


?>