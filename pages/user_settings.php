<?php require('header.php'); ?>
<?php 
require('conn.php'); 
 
    $result = $mysqli->query("SELECT * FROM `login`");
    
?>
  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List of users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           All users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>email</th>
                                        <th>Password</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($mem = mysqli_fetch_assoc($result)):
                                        echo '<tr>';
                                        echo '<td>'.$mem['id'].'</td>';
                                        echo '<td>'.$mem['email'].'</td>';
                                        echo '<td>'.$mem['password'].'</td>';
                                        echo '</tr>';
                                    endwhile;
                                    /* free result set */
                                    $result->close();
                                ?>
                                    
                                </tbody>
                        </table> 
 <?php require_once('footer.php'); ?>