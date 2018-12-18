<?php 
   	
    if(isset($_POST['addPayment'])){  
        require('conn.php');
        $id = $_POST['id'];
        $username = $_POST['username'];
        $amount = $_POST['amount'];
        $method = $_POST['method'];
        $months = $_POST['months'];
		$query = "INSERT INTO payment (username, amount, method, months) 
                    VALUES ('$username', '$amount', '$method', '$months')";
        if(mysqli_query($mysqli, $query)){
            header("location: tables.php");
    
        } else{
            echo "ERROR: Could not able to execute $query " . mysqli_error($mysqli);
        }
    }
        ?>