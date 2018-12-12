<?php 
    require_once('conn.php');
    require_once('header.php');
    
    
    $query_new = "SELECT * FROM technician";
    $result = mysqli_query($mysqli, $query_new) or die("invalid team");
    $row = mysqli_fetch_array($result);
    $total = $row[0];

?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Technician Team Member</h1>
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
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>GPN</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($mem = mysqli_fetch_assoc($result)):
                                        echo '<tr>';
                                        echo '<td>'.$mem['id'].'</td>';
                                        echo '<td>'.$mem['full_name'].'</td>';
                                        echo '<td>'.$mem['position'].'</td>';
                                        echo '<td>'.$mem['email'].'</td>';
                                        echo '<td>'.$mem['gpn'].'</td>';
                                        echo '</tr>';
                                    
                                    endwhile;
                                    /* free result set */
                                    $result->close();
                                ?>
<?php require_once('footer.php'); ?>