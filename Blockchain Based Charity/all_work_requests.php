<?php
    session_start(); 
    if(!isset($_SESSION['g_id'])){
        header("location: login.php");
    }
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'validate_block.php';
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
                                        All Work Requests
                                        <?php
                                            if(isBlockValid())
                                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                                        No tampering in data
                                                    </div>";
                                            else{
                                                echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                                                        There is tampering in Donation system. ";
                                                echo "Donation ID => ".$_SESSION['d_id'];
                                                echo "</div>";
                                            }
                                                
                                        ?>
                                    

                                    </header>
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>NGO</th>
                                                <th>Work Title</th>
                                                <th>Work Details</th>
                                                <th>Work File</th>
                                                <th>Work Status</th>
                                                <th>Tenders</th>
                                                <th>Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql = "SELECT work_req.*, ngo.n_name FROM `work_req` LEFT JOIN ngo ON ngo.n_id = work_req.n_id";
                                                $result = mysqli_query($con, $sql);
                                                $i = 1;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>";
                                                    echo "<td>".$i++."</td>";
                                                    echo "<td>".$row['n_name']."</td>";
                                                    echo "<td>".$row['w_title']."</td>";
                                                    echo "<td>".$row['w_details']."</td>";
                                                    echo "<td><a href='uploads/work/".$row['w_file']."' target='_blank'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></td>";
                                                    switch ($row['w_status']) {
                                                        case '0': echo "<td><a href='process_work_request.php?w_id=".$row['w_id']."&w_status=1'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> </button></a>&nbsp;<a href='process_work_request.php?w_id=".$row['w_id']."&w_status=2'><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> </button></a></td>"; break;
                                                        case '1': echo "<td>Approved</td>"; break;
                                                        case '2': echo "<td>Rejected</td>"; break;
                                                    }

                                                    if($row['w_status'] == 1){
                                                        echo "<td><a href='all_tenders.php?w_id=".$row['w_id']."'>Tenders</a></td>";
                                                    }else{
                                                        echo "<td>Rejected Or Pending</td>";
                                                    }
                                                    echo "<td>".date('Y-m-d H:i', $row['w_time'])."</td>";
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
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <!--Data Table-->
        <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
        <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="bower_components/datatables-scroller/js/dataTables.scroller.js"></script>

        <!--init data tables-->
        <script src="assets/js/init-datatables.js"></script>

        <!-- Common Script   -->
        <script src="dist/js/main.js"></script>

    </body>
</html>
