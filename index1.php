<?php 
include('server.php');


	if (isset($_GET['edit'])) {
		$Customer_ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer_13108 WHERE Customer_ID=$Customer_ID");

		
			$n = mysqli_fetch_array($record);
						$Customer_ID = $n['Customer_ID'];
                        $Name = $n['Name'];
						$ContactNo = $n['ContactNo'];
                        $Address = $n['Address'];
                        $CNIC = $n['CNIC'];
                        $Payment_Due  = $n['Payment_Due'];
			
                         

		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Customer 13108 </title>
	<link rel="stylesheet" type="text/css" href="style1.css">
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

<?php $results = mysqli_query($db, "SELECT * FROM customer_13108"); ?>

<table>
	<thead>
		<tr>

			<h3> CUSTOMER INFORMATION </h3>


			<th>Customer_ID</th>
                        <th>Name</th>
			<th>ContactNo</th>
			<th>Address</th>
                        <th>CNIC</th>
                        <th>Payment_Due</th>

			
			
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Customer_ID']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
			<td><?php echo $row['ContactNo']; ?></td>
			<td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['CNIC']; ?></td>
			<td><?php echo $row['Payment_Due']; ?></td>
			
			<td>
				<a href="index1.php?edit=<?php echo $row['Customer_ID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="server.php?del=<?php echo $row['Customer_ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $Customer_ID; ?>">
	<div class="input-group">
        </div>

            <div class="input-group">
		<label>Customer_ID</label>
		<input type="int" name="Customer_ID" value="<?php echo $Customer_ID; ?>">
	</div>
        
            <div class="input-group">
		<label>Name</label>
		<input type="text" name="Name" value="<?php echo $Name; ?>">
	</div>	

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="ContactNo" value="<?php echo $ContactNo; ?>">
	</div>

	
	<div class="input-group">
		<label>Address</label>
		<input type="text" name="Address" value="<?php echo $Address; ?>">
	</div>
        
        <div class="input-group">
		<label>CNIC</label>
		<input type="text" name="CNIC" value="<?php echo $CNIC; ?>">
	</div>

	        
        <div class="input-group">
		<label>Payment Due</label>
		<input type="text" name="Payment_Due" value="<?php echo $Payment_Due; ?>">
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


<?php>

/*                     **DEBUGGING** 

 NOT ALLOWING RECORDS TO BE EDITED OR DELETED WHERE Customer_ID ENTRY IS IN VARCHAR
 EVEN THOUGH THE TYPE FOR Customer_ID(PRIMARY KEY) COLUMN IS VARCHAR
 
 ONLY ALLOWING EDITING AND DELETION OF RECORDS WHERE Customer_ID IS IN INTEGER ONLY
*/
<?>