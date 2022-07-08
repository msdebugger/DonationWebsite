<?php
    session_start(); 
    if(!isset($_SESSION['c_id'])){
        header("location: login.php");
    }

    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';
    $w_id = 0;
    if(!isset($_GET['w_id']))
        header('location:index.php');
    $w_id = mysqli_real_escape_string($con, $_GET['w_id']);

    
?>
        <?php include 'includes/header.php';    ?>

            <!--main content start-->
            <div id="content" class="ui-content">
                <div class="ui-content-body">

                    <div class="ui-container">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="panel">
                                    <header class="panel-heading">
                                        Submit Tender Details
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal" method="post" action="submit_tender.php" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Work ID</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="w_id" type="text" value="<?php echo $w_id; ?>" required readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="t_description" class="control-label col-lg-3">Tender Details</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="t_description" name="t_description" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Tender Price</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="t_price" type="number"  required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Work File</label>
                                                    <div class="col-lg-9">
                                                        <input id="file" type="file" name="t_file" accept=".pdf">
                                                        <!--<span class="help-block">Example block-level help text here.</span>-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-6">
                                                        <button class="btn btn-primary" type="submit">Submit Tender</button>
                                                        <button class="btn btn-default" type="button">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  

                </div>
            </div>
            <!--main content end-->

            <!--footer start-->
            <?php include 'includes/footer.php';    ?>
            <!--footer end-->

        </div>

        <!-- inject:js -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <script src="dist/js/main.js"></script>

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/init-datepicker.js"></script>

        <!--From validation  -->
        <script src="bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/js/init-validation.js"></script>
        

    </body>
</html>
