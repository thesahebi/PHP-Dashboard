<?php

include_once "conn.php";
if(isset($_POST['add'])){   
    
    $full_name =        $_POST['full_name'];
    $ic_number =        $_POST['ic_number'];
    $passport_number =  $_POST['passport_number'];
    $netionality =      $_POST['netionality'];
    $sex =              $_POST['sex'];
    #$occupation =       $_POST['occupation'];
    $telephone =        $_POST['telephone'];
    $mobile =           $_POST['mobile'];
    $email =            $_POST['email'];
    $address =          $_POST['address'];
    $post_code =        $_POST['post_code'];
    $city =             $_POST['city'];
    $billing =          $_POST['billing'];
   # $upload =           $_POST['upload'];
    $package =          $_POST['package'];
    $login_id =         $_POST['login_id'];
    $password =         $_POST['password'];
    $password =         md5($password);  
    $activation_date =  $_POST['activation_date'];
    $deposit =          $_POST['deposit'];
    $connection_type =  $_POST['connection_type'];
    $equipment =        $_POST['equipment'];
    $remark =           $_POST['remark'];
   
$query = "INSERT INTO users (full_name, ic_number, passport_number, netionality, sex, telephone, mobile, email,
                             address, post_code, city, billing, package, login_id, password, activation_date, deposit, connection_type, equipment, remark) 
                     VALUES ('$full_name','$ic_number','$passport_number','$netionality','$sex','$telephone',
                     '$mobile','$email', '$address','$post_code','$city','$billing','$package', '$login_id','$password',
                     '$activation_date','$deposit','$connection_type','$equipment', '$remark')";
        
        if(mysqli_query($mysqli, $query)){
            header("location: tables.php");
    
        } else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($mysqli);
        }
    }
        ?>
        