<?php 
include('server4.php');
include('homepage.php');

	if (isset($_GET['edit'])) {
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_13108 WHERE user_ID='$user_ID'");

	
			$n = mysqli_fetch_array($record);
			$user_ID = $n['user_ID'];
			$password = $n['password'];
                        $status = $n['status'];
                 			$salesperson_ID  = $n['salesperson_ID']; 

		

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



<table>
	
	<thead>
		<tr>

			<h3> user_13108 INFORMATION </h3>


			<th>user_ID</th>
			<th>password</th>
			<th>status</th>
			<th>salesperson_ID</th>
			
	<?php $results = mysqli_query($db, "SELECT * FROM user_13108"); 
	if(!$results){
		echo "omar";
	}
	 while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['user_ID']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td><?php echo $row['salesperson_ID']; ?></td>
			<td>
				<a href="user_13108.php?edit=<?php echo $row['user_ID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server4.php?del=<?php echo $row['user_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server4.php" >

	<input type="hidden" name="user_ID" value="<?php echo $user_ID; ?>">
	<div class="input-group">

		
	
	<div class="input-group">
		<label>user_ID</label>
		<input type="text" name="user_ID" value="<?php echo $user_ID; ?>">
	</div>	
	<div class="input-group">
		<label>password</label>
		<input type="text" name="password" value="<?php echo $password ?>">
	</div>

	<div class="input-group">
		<label>status</label>
		<input type="text" name="status" value="<?php echo $status; ?>">
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