<?php
  require('conn.php');
  require('header.php');
  $result = $mysqli->query("SELECT * FROM Payment");
  
?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-primary "> UltraBand</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Payment information
                            <a data-toggle="modal" data-target="#add" style="float:right" ><i class="fa fa-user fa-plus"></i></a>
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"   id="dataTables-example">
                                <thead>
                                    <tr>
                                         <th width="70">ID</th>
                                        <th>username</th>
                                        <th>Payment method</th>
                                        <th>amount</th>
                                        <th>Date/Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($mem = mysqli_fetch_assoc($result)):
                                        echo '<tr>';
                                        echo '<td>'.$mem['id'].'</td>';
                                        echo '<td>'.$mem['username'].'</td>';
                                        echo '<td>'.$mem['method'].'</td>';
                                        echo '<td>'.$mem['amount'].'</td>';
                                        echo '<td>' .$mem['date'].'</td>';
                                        echo '</tr>';
                                    endwhile;
                                    /* free result set */
                                    $result->close();
                                ?>  
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
