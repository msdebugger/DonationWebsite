<?php
    session_start(); 
    if(!isset($_SESSION['c_id'])){
        header("location: login.php");
    }
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';
?>
    <?php include 'includes/header.php';    ?>

            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay">
                

                <div class="ui-content-body">

                    <div class="ui-container">

                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading panel-border">
                                        All Work Requirements
                                    
                                    </header>
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>NGO</th>
                                                <th>Work Title</th>
                                                <th>Work Details</th>
                                                <th>Time</th>
                                                <th>Submit Bid</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $w_id = array();
                                                $sql = "SELECT w_id FROM tender WHERE c_id = ".$_SESSION['c_id'];
                                                $result = mysqli_query($con, $sql);
                                                if(mysqli_num_rows($result)>0){
                                                    while($row = mysqli_fetch_assoc($result))
                                                        array_push($w_id, $row['w_id']);
                                                }
                                                    

                                                $sql = "SELECT work_req.*, ngo.n_name FROM `work_req` LEFT JOIN ngo ON ngo.n_id = work_req.n_id WHERE work_req.w_status = 1";
                                                $result = mysqli_query($con, $sql);
                                                if(mysqli_num_rows($result)>0){
                                                    $i = 1;
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        echo "<tr>";
                                                        echo "<td>".$i++."</td>";
                                                        echo "<td>".$row['n_name']."</td>";
                                                        echo "<td>".$row['w_title']."</td>";
                                                        echo "<td>".$row['w_details']."</td>";
                                                        echo "<td>".date("Y-m-d H:i", $row['w_time'])."</td>";
                                                        if(in_array($row['w_id'], $w_id))
                                                            echo "<td>Already Submitted Bid</td>";
                                                        else
                                                            echo "<td><a href='process_work_request.php?w_id=".$row['w_id']."&w_status=1'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-check' aria-hidden='true'></span> </button></a></td>";
                                                        
                                                        echo "</tr>";
                                                    }    
                                                }
                                                

                                            ?>
                                            
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
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

        <!--Data Table-->
        <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="../bower_components/datatables-scroller/js/dataTables.scroller.js"></script>

        <!--init data tables-->
        <script src="../assets/js/init-datatables.js"></script>

        <!-- Common Script   -->
        <script src="../dist/js/main.js"></script>

    </body>
</html>
