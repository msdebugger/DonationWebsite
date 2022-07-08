<?php
    session_start(); 
    if(!isset($_SESSION['u_id'])){
        header("location: login.php");
    }
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'validate_block.php';
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
                                        All Donation Rquirement
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
                                                <th>Sr. No</th>
                                                <th>Ngo</th>
                                                <th>Work</th>
                                                <th>Price</th>
                                                <th>Donate</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql = "SELECT tender.t_id, work_req.w_id, work_req.w_title, tender.t_price, ngo.n_name FROM `tender` LEFT JOIN work_req ON work_req.w_id = tender.w_id LEFT JOIN ngo ON work_req.n_id = ngo.n_id WHERE t_status = 1";
                                                $result = mysqli_query($con, $sql);
                                                $i = 1;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>";
                                                    echo "<td>".$i++."</td>";
                                                    echo "<td>".$row['n_name']."</td>";
                                                    echo "<td>".$row['w_title']."</td>";
                                                    echo "<td>".$row['t_price']."</td>";
                                                    echo "<td><a href='donate.php?t_id=".$row['t_id']."&w_id=".$row['w_id']."'>Donate</a></td>";
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
