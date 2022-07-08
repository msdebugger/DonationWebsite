<?php
    session_start(); 
    if(!isset($_SESSION['g_id'])){
        header("location: login.php");
    }
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';
    $w_id = $_GET['w_id'];
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
                                        All Tenders
                                    </header>
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Tender ID</th>
                                                <th>Contractor</th>
                                                <th>Description</th>
                                                <th>Tender File</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                                <th>Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $sql = "SELECT t_id FROM tender WHERE w_id = ".$w_id." AND t_status = 1";
                                                $result = mysqli_query($con, $sql);
                                                $count = 0;
                                                $t_id = 0;

                                                if(mysqli_num_rows($result) != 0){
                                                    $count = mysqli_num_rows($result);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $t_id = $row['t_id'];
                                                }

                                                $sql = "SELECT `t_id`,  `t_description`, `t_file`, `t_time`, `t_price`, t_status, c_name FROM `tender` LEFT JOIN contractor ON contractor.c_id = tender.c_id WHERE w_id = ".$w_id;
                                                $result = mysqli_query($con, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>";
                                                    echo "<td>".$row['t_id']."</td>";
                                                    echo "<td>".$row['c_name']."</td>";
                                                    echo "<td>".$row['t_description']."</td>";
                                                    echo "<td><a href='uploads/tender/".$row['t_file']."' target='_blank'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></td>";
                                                    echo "<td>".$row['t_price']."</td>";
                                                    if($count == 0){
                                                        switch ($row['t_status']) {
                                                            case '0': echo "<td><a href='process_tender_request.php?t_id=".$row['t_id']."&t_status=1'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> </button></a>&nbsp;<a href='process_tender_request.php?t_id=".$row['t_id']."&t_status=2'><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> </button></a></td>"; break;

                                                            case '2':
                                                                echo "<td>Bid Rejected.</td>";
                                                                break;
                                                            
                                                            default:
                                                                echo "<td>Approved Already</td>";
                                                                break;
                                                        }  
                                                    }else{
                                                        switch ($row['t_status']) {
                                                            case '0':
                                                                echo "<td>Tender Accepted for Other User.</td>";
                                                                break;
                                                            
                                                            case '1':
                                                                echo "<td>Approved</td>";
                                                                break;

                                                            case '2':
                                                                echo "<td>Rejected</td>";
                                                                break;
                                                        }
                                                    }
                                                    
                                                    echo "<td>".date('Y-m-d H:i', $row['t_time'])."</td>";
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
