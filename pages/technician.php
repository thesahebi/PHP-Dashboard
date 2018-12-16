<?php
    require('conn.php');
    require('header.php');
    $result = $mysqli->query("SELECT * FROM technician");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query1 = "delete from technician where id='$id'";
        $result1 = mysqli_query($mysqli, $query1) or die("Not Deleted");
        header("location:technician.php");
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
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="70">ID</th>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>GPN</th>
                                        <th>Edit Member</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 $no = 1;
                                    while ($mem = mysqli_fetch_assoc($result)):
                                        echo"<tr>";
                                        echo "<td>" .  "$no" . "</td>";
                                        #echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $mem['full_name'] . "</td>";
                                        echo "<td>" . $mem['position'] . "</td>";
                                        echo "<td>" . $mem['email'] . "</td>";
                                        echo "<td>" . $mem['gpn']  . "</td>";
                                        echo '<td>
                                                    <a data-toggle="modal" data-target="#view" data-whatever="'.$mem['id'].' "
                                                     class="btn btn-small btn-success"><i class="fa fa-search-plus"></i></a>
                                                    <a class="btn btn-small btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    data-whatever="'.$mem['id'].' "><i class="fa fa-edit"></i></a>
                                                    <a href="technician.php?id='.$mem['id'].'" class="btn btn-small btn-danger"><i class="fa fa-times"></i></a>

                                                </td>';
                                        echo '</tr>';
                                        $no++;
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

    </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<!-- edit user script -->
    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "editTechnician.php",
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
