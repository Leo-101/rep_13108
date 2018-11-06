<?php 
include('server1.php');
include('homepage.php');


	if (isset($_GET['edit'])) {
		$product_ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product_13108 WHERE product_ID='$product_ID'");

	
		$n = mysqli_fetch_array($record);
			$product_ID = $n['product_ID'];
			$brand = $n['brand'];
            $type = $n['type'];
            $shade  = $n['shade']; 
			$size  = $n['size']; 
			$price  = $n['price']; 

		

	}
?>

<!DOCtype html>
<html>
<head>
	<title>CRUD PHP MySQL 13108 </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM product_13108"); ?>

<table>
	
	<thead>
		<tr>

			<h3> PRODUCT TABLE </h3>


			<th>product_ID</th>
			<th>brand</th>
			<th>type</th>
			<th>shade</th>
			<th>size</th>
			<th>price</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM product_13108"); 
	if(!$results){
		echo "12869";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['product_ID']; ?></td>
			<td><?php echo $row['brand']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['shade']; ?></td>
			<td><?php echo $row['size']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td>
				<a href="product_13108.php?edit=<?php echo $row['product_ID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server1.php?del=<?php echo $row['product_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server1.php" >

	<input type="hidden" name="id" value="<?php echo $product_ID; ?>">
	<div class="input-group">
       </div>
		
	
	<div class="input-group">
		<label>product_ID</label>
		<input type="text" name="product_ID" value="<?php echo $product_ID; ?>">
	</div>	
	<div class="input-group">
		<label>brand</label>
		<input type="text" name="brand" value="<?php echo $brand; ?>">
	</div>

	<div class="input-group">
		<label>type</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
	</div>

	<div class="input-group">
		<label>shade</label>
		<input type="text" name="shade" value="<?php echo $shade; ?>">
	</div>
	<div class="input-group">
		<label>size</label>
		<input type="text" name="size" value="<?php echo $size; ?>">
	</div>
	<div class="input-group">
		<label>price</label>
		<input type="text" name="price" value="<?php echo $price; ?>">
	</div>

	
       

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>