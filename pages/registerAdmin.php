<?php
require('conn.php');
session_start();
$username = "";
$email    = "";
$errors = array();
    if (isset($_POST['add'])) {
        // receive all input values from the form
        $firstName =  mysqli_real_escape_string($mysqli, $_POST['firstName']);
        $lastName  =  mysqli_real_escape_string($mysqli, $_POST['lastName']);
        $email     =  mysqli_real_escape_string($mysqli, $_POST['email']);
        $username  =  mysqli_real_escape_string($mysqli, $_POST['username']);
        $password  =  mysqli_real_escape_string($mysqli, $_POST['password']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($firstName))  { array_push($errors, "first Name is required"); }
        if (empty($lastName))   { array_push($errors, "Last Name is required");  }
        if (empty($email))      { array_push($errors, "Email is required");      }
        if (empty($username))   { array_push($errors, "Username is required");   }
        if (empty($password))   { array_push($errors, "Password is required");   }

}
// first check the database to make sure
// a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM registeradmin WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
    if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
        array_push($errors, "email already exists");
    }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
//       $password = md5($password);//encrypt the password before saving in the database

        $query = "INSERT INTO `registeradmin`(`firstName`, `lastName`, `email`, `username`, `password`) 
                                      VALUES ('$firstName','$lastName', '$email', '$username','$password')";
        mysqli_query($mysqli, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>UltraBand Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
        }
        .form-control{
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }
        .form-control:focus{
            border-color: #5cb85c;
        }
        .form-control, .btn{
            border-radius: 3px;
        }
        .signup-form{
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .signup-form h2{
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }
        .signup-form h2:before, .signup-form h2:after{
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }
        .signup-form h2:before{
            left: 0;
        }
        .signup-form h2:after{
            right: 0;
        }
        .signup-form .hint-text{
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }
        .signup-form form{
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form .form-group{
            margin-bottom: 20px;
        }
        .signup-form input[type="checkbox"]{
            margin-top: 3px;
        }
        .signup-form .btn{
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }
        .signup-form .row div:first-child{
            padding-right: 10px;
        }
        .signup-form .row div:last-child{
            padding-left: 10px;
        }
        .signup-form a{
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover{
            text-decoration: none;
        }
        .signup-form form a{
            color: #5cb85c;
            text-decoration: none;
        }
        .signup-form form a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
        <div class="signup-form">
            <form id="register" action="registerAdmin.php" method="post">
                <h2>Register</h2>
                <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6"><input type="text" class="form-control" name="firstName" placeholder="First Name" required="required"></div>
                        <div class="col-xs-6"><input type="text" class="form-control" name="lastName" placeholder="Last Name" required="required"></div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="privacyPolicy.txt">Privacy Policy</a></label>
                </div>
                <div class="form-group">
                    <button type="submit" name="add" class="btn btn-success btn-lg btn-block">Register Now</button>

                </div>
            </form>
            <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
        </div>

</body>
</html>

