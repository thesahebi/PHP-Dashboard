<?php
  require('conn.php');
  require('header.php');
  $result = $mysqli->query("SELECT * FROM `users` INNER JOIN payment ON users.login_id=payment.username");
  
?>
 <div id="page-wrapper">
     <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header text-primary "> UltraBand</h1>
            </div>  <!-- /.col-lg-12 -->
            </div>
     <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Payment information
                            <a data-toggle="modal" data-target="#payment" style="float:right"><i class="fa fa-user fa-plus"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"   id="dataTables-example">
                                <thead>
                                    <tr>
                                         <th width="70">ID</th>
                                        <th>username</th>
                                        <th>Activation date</th>
                                        <th>Mobile</th>
                                        <th>amount</th>
                                        <th>Payment</th>
                                        <th>Payment method</th>
                                        <th>Email</th>
                                        <th>Deposit</th>
                                        <th>Status</th>
                                        <th>Edit Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($mem = mysqli_fetch_assoc($result)):
                                        echo '<tr>';
                                        echo '<td>'.$mem['id'].'</td>';
                                        echo '<td>'.$mem['username'].'</td>';
                                        echo '<td>'.$mem['activation_date'].'</td>';
                                        echo '<td>'.$mem['mobile'].'</td>';
                                        echo '<td>'.$mem['amount'].'</td>';
                                        echo '<td>' .$mem['date'].'</td>';
                                        echo '<td>'.$mem['method'].'</td>';
                                        echo '<td>'.$mem['email'].'</td>';
                                        echo '<td>' .$mem['deposit'].'</td>';
                                        echo '<td>';
                                        if($mem['Status'] == 'active'){
                                            echo '<span class="badge" style="background-color:#4dbd74;">'.$mem['Status'] .'</span>';
                                        }
                                        else if($mem['Status'] == 'suspended'){
                                            echo '<span class="badge" style="background-color:#ffc107;">'.$mem['Status'].'</span>';
                                        }
                                        else{
                                            echo '<span class="badge" style="background-color:#f86c6b;">'.$mem['Status'].'</span>';
                                        }
                                        echo '</td>';
                                        echo '<td>
                                                    <a data-toggle="modal" data-target="#view" data-whatever="'.$mem['id'].' "
                                                     class="btn btn-small btn-success"><i class="fa fa-search-plus"></i></a>
                                                    <a class="btn btn-small btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    data-whatever="'.$mem['id'].' "><i class="fa fa-edit"></i></a>
                                                    <a href="tables.php?id='.$mem['id'].'" class="btn btn-small btn-danger"><i class="fa fa-times"></i></a>

                                              </td>';
                                        echo '</tr>';
                                    endwhile;
                                    /* free result set */
                                    $result->close();
                                ?>  
                                </tbody>
                            </table>
                     </div> <!-- /.panel-body -->
                </div><!-- /.panel -->
            </div> <!-- /.col-lg-12 -->
      </div> <!-- /.row -->
 </div> <!-- /#page-wrapper -->

<!-- add payment method -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="payment">Add Payment</h4>
    </div>
        <div class="modal-body">
            <form role="form" action="addPayment.php" method="post" >
                    <div class="form-group col-md-6">
                        <label class="control-label">ID</label>
                        <input type="text" name="id" placeholder="<?php echo '1'; ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Username</label>
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Amount</label>
                        <input type="text" name="amount" placeholder="Amount" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Method of Payment</label>
                        <input type="text" name="method" placeholder="CIMB/Cash" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Chose the Month</label><br>
                        <input type="radio" name="months" value="january" checked>january &nbsp
                        <input type="radio" name="months" value="febuary" >febuary &nbsp
                        <input type="radio" name="months" value="march" >March &nbsp
                        <input type="radio" name="months" value="april" >April &nbsp
                        <input type="radio" name="months" value="may" >May &nbsp
                        <input type="radio" name="months" value="june" >june &nbsp
                        <input type="radio" name="months" value="july" >July &nbsp
                        <input type="radio" name="months" value="august" >August &nbsp
                        <input type="radio" name="months" value="september" >September &nbsp
                        <input type="radio" name="months" value="october" >October &nbsp
                        <input type="radio" name="months" value="december" >December &nbsp
                        </label>
                    </div>
                    <div class="panel-body form-horizontal payment-form">
                    <div class="modal-footer" style="margin-right:15px;">   
                            <button type="submit" name="addPayment" value="addPayment" class="btn btn-default">Submit</button>
                            <button type="reset" class="btn btn-default">Reset Entry</button>
                    </div>
                    </div>
            </form>
        </div> <!-- / panel preview -->


    </div>
</div>



<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
      
        $('#dataTables-example').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'print'
        ]
    });
    });
    </script>
   
    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "editdata.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
    </script>
    <script>
    $('#view').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "view.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>

</body>
</html>