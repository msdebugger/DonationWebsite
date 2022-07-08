<?php
    session_start(); 
    if(!isset($_SESSION['n_id'])){
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
                                        All Work Requirement
                                    
                                    </header>
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Title</th>
                                                <th>Details</th>
                                                <th>Status</th>
                                                <th>Donation Received</th>
                                                <th>Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql = "SELECT `w_id`, `w_title`, `w_details`, `w_status`, `w_time` FROM `work_req` WHERE n_id = ".$_SESSION['n_id'];
                                                $result = mysqli_query($con, $sql);
                                                $i = 1;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>";
                                                    echo "<td>".$i++."</td>";
                                                    echo "<td>".$row['w_title']."</td>";
                                                    echo "<td>".$row['w_details']."</td><td>";
                                                    switch ($row['w_status']) {
                                                        case '0': echo "Pending"; break;
                                                        case '1': echo "Approved"; break;
                                                        case '2': echo "Rejected"; break;
                                                    }
                                                    if($row['w_status'] == 1){
                                                        $sql2 = "SELECT SUM(d_amount) as donations FROM `donation` WHERE w_id = ".$row['w_id'];
                                                        $result2 = mysqli_query($con, $sql2);
                                                        $row2 = mysqli_fetch_assoc($result2);
                                                        echo "</td><td>".$row2['donations'];
                                                    }else{
                                                        echo "</td><td>Work No Accepted";
                                                    }

                                                    echo "</td><td>".date('Y-m-d H:i',$row['w_time'])."</td>";
                                                    echo "</tr>";
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
