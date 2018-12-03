<?php
    require('conn.php');
    $id = $_GET['id'];

    $members = $mysqli->query("SELECT * FROM `test` WHERE `id`='$id'");
    $mem = mysqli_fetch_assoc($members);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
</head>
<body>
	<div class="modal-body">
        <table width="100%" class="table table-striped table-bordered table-hover" style="border-radius:5px!important;">
            <tr>
                <th>Name </th>
                <td><?php echo $mem['name'];?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $mem['email'];?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $mem['phone'];?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $mem['address'];?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $mem['status'];?></td>
            </tr>
        </table> 
	</div>
	</form>
</body>
</html>
