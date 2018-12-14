<?php #endregion
    require('conn.php');
        if(isset($_POST) & !empty($_POST)){
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $sql = "SELECT * FROM `login` WHERE email = '$email'";
            $res = mysqli_query($mysqli, $sql);
            $count = mysqli_num_rows($res);
            if($count == 1){
                echo "Send email to user with password";
            }else{
                echo "User name does not exist in database";
            }
        }

        
       

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Forgot Password</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forgot Password</h3>
                    </div>
                    <div class="panel-body">
                    <form role="form" id="login" action="forgot_password.php" method="post">
                    <fieldset>
                                <div class="form-group" >
                                <label for="email" class="label--lighter">Email</label>
                                    <input class="form-control" name="email" type="text"   value="" placeholder="email" autofocus="">
                                </div>
                                <input class="btn btn-lg btn-success btn-block type="submit" name="send" value="Send Me To" class="btn btn-default">
                                <a href="login.php" class="btn btn-lg btn-primary btn-block">Back to Login</a> 
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
