<?php
    session_start(); 
    if(!isset($_SESSION['u_id'])){
        header("location: login.php");
    }


    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';
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
                                        Add Donation
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal " method="post" action="donate_back.php">
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Amount</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="d_amount" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Card No</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="d_card_no" type="number" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Card Month</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="d_card_month" type="number" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Card Year</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="d_card_year" type="number" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Card CVV</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="d_card_cvv" type="number" required />
                                                    </div>
                                                </div>
                                                <div class="form-group "  style="display: none;">
                                                    <label for="username" class="control-label col-lg-3">Work ID</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="w_id" type="text" value="<?php echo $_GET['w_id']; ?>" required />
                                                    </div>
                                                </div>
                                                <div class="form-group " style="display: none;">
                                                    <label for="username" class="control-label col-lg-3">Tender ID</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="t_id" type="text" value="<?php echo $_GET['t_id']; ?>" required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-6">
                                                        <button class="btn btn-primary" type="submit">Submit Donation</button>
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
