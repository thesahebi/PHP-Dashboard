<?php 
    require_once('conn.php');
    require_once('header.php');

    $sql = "SELECT * FROM technician";
    if($result=mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
           echo"<div id='page-wrapper'>
                    <div class='row'>
                     <div class='col-lg-12'>
                        <h1 class='page-header'>Technician Team Member</h1>
                    </div>
                    </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='panel panel-default'>
                                <div class='panel-heading'>
                                All users
                                </div>
                        
                                <div class='panel-body'>
                                <table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>GPN</th>
                                        <th>Edit Member</th>
                                    </tr>
                                </thead>
                                <tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo"<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['gpn']  . "</td>";
                    echo "<td>
                        <a data-toggle='modal' data-target='view' data-whatever=' " . $row['id'] . " '
                        class='btn btn-small btn-success'><i class='fa fa-search-plus'></i></a>
                        <a class='btn btn-small btn-primary'
                        data-toggle='modal'
                        data-target='exampleModal'
                        data-whatever='".$row['id']."' ><i class='fa fa-edit'></i></a>
                        <a href='technician.php?id=".$row['id']."' class='btn btn-small btn-danger'><i class='fa fa-times'></i></a>

                   </td>";   
                    echo"</tr>";
                }
                echo "</table";
                mysqli_free_result($result);

        }else{
            echo "No records matching your query were found.";
        }
        }else{ "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);

        }
        mysqli_close($mysqli);

    echo"</tbody>
    </div>
    </div>
    </div>
    </div>
    </div>"
    ;

?>

<?php require_once('footer.php'); ?>