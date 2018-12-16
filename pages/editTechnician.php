<?php
    require('conn.php');	
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
    	$id2 = $_POST['id'];
    	$full_name = $_POST['full_name'];
    	$mobile = $_POST['mobile'];
    	$address = $_POST['address'];
		$email = $_POST['email'];
		$status = $_POST['Status'];
		$mysqli->query("UPDATE users SET full_name='$full_name', mobile = '$mobile', address='$address', email='$email',
		 Status='$status' WHERE id='$id2'"); 
		header("location:tables.php");
    }
    $members = $mysqli->query("SELECT * FROM users WHERE id='$id'");
    $mem = mysqli_fetch_assoc($members);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
<form method="post" action="editdata.php" role="form">
	<div class="modal-body">
		<div class="form-group">
			<label for="id">ID</label>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $mem['id'];?>" readonly="true"/>

		</div>
		<div class="form-group">
			<label for="full_name">Full Name</label>
			<input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $mem['full_name'];?>" />
		</div>
		<div class="form-group">
			<label for="mobile">Mobile</label>
				<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mem['mobile'];?>" />
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" name="address" value="<?php echo $mem['address'];?>" />

		</div>
		<div class="form-group">
      <label for="email">Email</label>
			<input type="text" class="form-control" id="email" name="email" value="<?php echo $mem['email'];?>" />
		</div>
		<div class="form-group">
      <label for="Status">Status</label>
			<input type="text" class="form-control" id="Status" name="Status" value="<?php echo $mem['Status'];?>" />
		</div>
		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</form>
</body>
</html>
