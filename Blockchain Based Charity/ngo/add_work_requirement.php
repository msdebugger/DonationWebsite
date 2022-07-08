<?php
    session_start(); 
    if(!isset($_SESSION['n_id'])){
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
                                        Add NGO
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal " method="post" action="add_work_requirement_back.php" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Work Title</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="w_title" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="ccomment" class="control-label col-lg-3">Work Details</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="w_details" name="w_details" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword1" class="col-lg-3 col-sm-3 control-label">Work File</label>
                                                    <div class="col-lg-9">
                                                        <input id="file" type="file" name="w_file" accept=".pdf">
                                                        <!--<span class="help-block">Example block-level help text here.</span>-->
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="ccomment" class="control-label col-lg-3">Work Document</label>
                                                    <div class="col-lg-6">
                                                        <input id="exampleInputFile" type="file">
                                                    </div>
                                                </div> -->
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-6">
                                                        <button class="btn btn-primary" type="submit">Add Work Requirement</button>
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
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="../bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <script src="../dist/js/main.js"></script>

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/js/init-datepicker.js"></script>

        <!--From validation  -->
        <script src="../bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../assets/js/init-validation.js"></script>
        

    </body>
</html>
