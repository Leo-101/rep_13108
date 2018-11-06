<?php 
include('server3.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$salesperson_ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM salesperson_13108 WHERE salesperson_ID='$salesperson_ID'");

	
			$n = mysqli_fetch_array($record);
			
			$name = $n['name'];
            $contactNo = $n['contactNo'];
            $people_assigned  = $n['people_assigned']; 
            $salesperson_ID = $n['salesperson_ID'];
		

	}
?>
<!DOCTYPE html>
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

<?php $results = mysqli_query($db, "SELECT * FROM salesperson_13108"); ?>

<table>
	
	<thead>
		<tr>

			<h3> SALESPERSON TABLE </h3>


			
			<th>name</th>
			<th>contactNo</th>
			<th>people_assigned</th>
			<th>salesperson_ID</th>
	
	<?php $results = mysqli_query($db, "SELECT * FROM salesperson_13108"); 
	if(!$results){
		echo "omer";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['contactNo']; ?></td>
			<td><?php echo $row['people_assigned']; ?></td>
			<td><?php echo $row['salesperson_ID']; ?></td>
			
			<td>
				<a href="salesperson_13108.php?edit=<?php echo $row['salesperson_ID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server3.php?del=<?php echo $row['salesperson_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server3.php" >

	<input type="hidden" name="id" value="<?php echo $salesperson_ID; ?>">
	<div class="input-group">
    </div> 

	
	<div class="input-group">
		<label>name</label>
		<input type="text" name="name" value="<?php echo $name ?>">
	</div>

	<div class="input-group">
		<label>contactNo</label>
		<input type="text" name="contactNo" value="<?php echo $contactNo; ?>">
	</div>

	<div class="input-group">
		<label>people_assigned</label>
		<input type="text" name="people_assigned" value="<?php echo $people_assigned; ?>">
	</div>

	<div class="input-group">
		<label>salesperson_ID</label>
		<input type="text" name="salesperson_ID" value="<?php echo $salesperson_ID; ?>">
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