<?php
    require('conn.php');
    $id = $_GET['id'];

    $members = $mysqli->query("SELECT * FROM `users` WHERE `id`='$id'");
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
                <th>full name </th>
                <td><?php echo $mem['full_name'];?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $mem['email'];?></td>
            </tr>
            <tr>
                <th>mobile</th>
                <td><?php echo $mem['mobile'];?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $mem['address'];?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $mem['Status'];?></td>
            </tr>
            <tr>
                <th>ic number</th>
                <td><?php echo $mem['ic_number'];?></td>
            </tr>
            <tr>
                <th>passport number</th>
                <td><?php echo $mem['passport_number'];?></td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td><?php echo $mem['netionality'];?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $mem['sex'];?></td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td><?php echo $mem['occupation'];?></td>
            </tr>
            <tr>
                <th>Telephone</th>
                <td><?php echo $mem['telephone'];?></td>
            </tr>
            <tr>
                <th>Post Code</th>
                <td><?php echo $mem['post_code'];?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $mem['city'];?></td>
            </tr>
            <tr>
                <th>Billing</th>
                <td><?php echo $mem['billing'];?></td>
            </tr>
            <tr>
                <th>upload</th>
                <td><?php echo $mem['upload'];?></td>
            </tr>
            <tr>
                <th>package</th>
                <td><?php echo $mem['package'];?></td>
            </tr>
            <tr>
                <th>login_id</th>
                <td><?php echo $mem['login_id'];?></td>
            </tr>
            <tr>
                <th>password</th>
                <td><?php echo $mem['password'];?></td>
            </tr>
            <tr>
                <th>activation date</th>
                <td><?php echo $mem['activation_date'];?></td>
            </tr>
            <tr>
                <th>connection type</th>
                <td><?php echo $mem['connection_type'];?></td>
            </tr>
            <tr>
                <th>equipment</th>
                <td><?php echo $mem['equipment'];?></td>
            </tr>
            <tr>
                <th>remark</th>
                <td><?php echo $mem['remark'];?></td>
            </tr>
        </table> 
	</div>
	</form>
</body>
</html>
