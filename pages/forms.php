<?php require('header.php'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        fillup the form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="insert_customer_sql_process.php" method="post" >
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
						                    <input type="text" name="full_name" placeholder="Full name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <label class="control-label">IC Number</label>
						                <input type="text" name="ic_number" placeholder="IC number" class="form-control">
                                        </div>
                                        <div class="form-group">
                           
                                        <label class="control-label">Passport Number</label>
                                        <input type="text" name="passport_number" placeholder="passport number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nationality</label>
                                        <input type="text" name="netionality" placeholder="Nationality" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <input type="radio" name="sex" value="Male" checked>Male
                                        <input type="radio" name="sex" value="Female" checked>Female
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Occupation</label>
                                        <input type="text" name="occupation" placeholder="Studen, UNHCR..." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Telephone</label>
                                        <input type="text" name="telephone" placeholder="03xxxxxxxx" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="text" name="mobile" placeholder="0060xxxxxxx" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">E-mail</label>
                                        <input type="text" name="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input type="text" name="address" placeholder="PPI-21-12 Permai ...." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Post Code</label>
                                        <input type="text" name="post_code" placeholder="68000" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input type="text" name="city" placeholder="Kuala lumpur..." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Billing Address</label>
                                        <input type="text" name="billing" placeholder="PPA-21-10 Permai..." class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label">Copy of Passport or IC</label>
                                    <input name="upload" class="form-control type="file">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Package</label>
                                        <input type="radio" name="package" value="10Mb" checked>10Mb
                                        <input type="radio" name="package" value="30Mb" >30Mb
                                        <input type="radio" name="package" value="50Mb">50Mb
                                        <input type="radio" name="package" value="100Mb">100Mb
                                        <input type="radio" name="package" value="200Mb">200Mb
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Login ID</label>
                                        <input type="text" name="login_id" placeholder="Username" class="form-control">	
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="password" placeholder="Password" class="form-control">	
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Activation Date</label>
                                        <input type="text" name="activation_date" placeholder="2018/12/11" class="form-control">	
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Deposit</label>
                                        <input type="text" name="deposit" placeholder="RM" class="form-control">	
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Connection type</label>
                                        <input type="radio" name="connection_type" value="point to point" checked>point to point
                                        <input type="radio" name="connection_type" value="fiber" >fiber
                                        <input type="radio" name="connection_type" value="cat5">cat5
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Equitment</label>
                                        <input type="text" name="equipment" placeholder="Mikrotik..." class="form-control">	
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Note</label>
                                        <textarea type="text" name="remark" placeholder="Contract is for one year..." class="form-control"></textarea>
                                    </div>    
                                        <button type="submit" name="add" value="Add" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset Entry</button>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                    </div>    
                              
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>
