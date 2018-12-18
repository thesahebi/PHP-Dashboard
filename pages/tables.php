<?php
    require('conn.php');
    require('header.php');
    $result = $mysqli->query("SELECT * FROM users");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query1 = "delete from users where id='$id'";
        $result1 = mysqli_query($mysqli, $query1) or die("Not Deleted");
        header("location:tables.php");
    }
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Edit Member Detail</h4>
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Edit Member Detail</h4>
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>

<!-- add cash button modal-->
<!-- <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Edit Payment Detail</h4>
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div> -->
<!-- End of add cash modal -->
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
                            List of Users
                            <a data-toggle="modal" data-target="#add" style="float:right" ><i class="fa fa-user fa-plus"></i></a>
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"   id="dataTables-example">
                                <thead>
                                    <tr>
                                         <th width="70">ID</th>
                                        <th>Full Name</th>
                                        <th>User Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Edit User Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while ($mem = mysqli_fetch_assoc($result)):
                                        echo '<tr>';
                                        echo '<td>'.$mem['id'].'</td>';
                                        echo '<td>'.$mem['full_name'].'</td>';
                                        echo '<td>'.$mem['login_id'].'</td>';
                                        echo '<td>'.$mem['mobile'].'</td>';
                                        echo '<td>'.$mem['address'].'</td>';
                                        
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
                                                    <a data-toggle="modal" data-target="#view" data-whatever="'.$mem['id'].' "class="btn btn-small btn-success"><i class="fa fa-search-plus"></i></a>
                                                    <a class="btn btn-small btn-primary"data-toggle="modal" data-target="#exampleModal" data-whatever="'.$mem['id'].' "><i class="fa fa-edit"></i></a>
                                                    <a href="tables.php?id='.$mem['id'].'" class="btn btn-small btn-danger"><i class="fa fa-times"></i></a>
            
                                                    <a data-toggle="modal" data-target="#payment" data-whatever="'.$mem['id'].' "class="btn btn-small btn-success"><i class="fa fa-plus"></i></a>

                                                    </td>';
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

<!-- Modal add User -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Add User</h4>
            </div>
            <div class="modal-body">
            <form role="form" action="insert_customer_sql_process.php" method="post" >
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Full Name</label>
						                    <input type="text" name="full_name" placeholder="Full name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label class="control-label">IC Number</label>
						                <input type="text" name="ic_number" placeholder="IC number" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                           
                                        <label class="control-label">Passport Number</label>
                                        <input type="text" name="passport_number" placeholder="passport number" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Nationality</label>
                                        <input type="text" name="netionality" placeholder="Nationality" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="control-label">Gender</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="Male" checked>Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="sex" value="Female" checked>Female
                                    </label>
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label class="control-label">Occupation</label>
                                        <input type="text" name="occupation" placeholder="Studen, UNHCR..." class="form-control">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Equitment</label>
                                        <input type="text" name="equipment" placeholder="Mikrotik..." class="form-control">	
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Telephone</label>
                                        <input type="text" name="telephone" placeholder="03xxxxxxxx" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="text" name="mobile" placeholder="0060xxxxxxx" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">E-mail</label>
                                        <input type="text" name="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Address</label>
                                        <input type="text" name="address" placeholder="PPI-21-12 Permai ...." class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Post Code</label>
                                        <input type="text" name="post_code" placeholder="68000" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="control-label">City</label>
                                        <input type="text" name="city" placeholder="Kuala lumpur..." class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Billing Address</label>
                                        <input type="text" name="billing" placeholder="PPA-21-10 Permai..." class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="control-label">Copy of Passport or IC</label>
                                    <input name="upload" class="form-control" type="file">
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Login ID</label>
                                        <input type="text" name="login_id" placeholder="Username" class="form-control">	
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="password" placeholder="Password" class="form-control">	
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Activation Date</label>
                                        <input type="text" name="activation_date" placeholder="2018/12/11" class="form-control">	
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Deposit</label>
                                        <input type="text" name="deposit" placeholder="RM" class="form-control">	
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Package</label><br>
                                        <label class="radio-inline">
                                        <input type="radio" name="package" value="10Mb" checked>10Mb
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="package" value="30Mb" >30Mb
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="package" value="50Mb">50Mb
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="package" value="100Mb">100Mb
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="package" value="200Mb">200Mb
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Connection type</label><br>
                                        <label class="radio-inline">
                                        <input type="radio" name="connection_type" value="point to point" checked>point to point
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="connection_type" value="fiber" >fiber
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="connection_type" value="cat5">cat5
                                        </label>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Note</label>
                                        <textarea type="text" name="remark" rows="5" placeholder="Contract is for one year..." class="form-control"></textarea>
                                    </div> 
                                    </div>
                                    <div class="modal-footer" style="margin-right:15px;">   
                                        <button type="submit" name="add" value="Add" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset Entry</button>
                                        </form>
                                        </div> 
        </div>
    </div>
</div>
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
                        </form>
                </div>
            </div>            
        </div> <!-- / panel preview -->
        
	</div>
</div>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
