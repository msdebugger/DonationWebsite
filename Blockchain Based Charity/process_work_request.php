<?php
	session_start(); 
    if(!isset($_SESSION['g_id'])){
        header("location: login.php");
    }
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';

    echo '<html><head><title></title>
				<link rel="stylesheet" href="dist/css/main.css">
				<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';

	if(isset($_GET['w_id']) && isset($_GET['w_status'])){
		$w_id = mysqli_real_escape_string($con, $_GET['w_id']);
		$w_status = mysqli_real_escape_string($con, $_GET['w_status']);

		$sql = "UPDATE `work_req` SET w_status = ".$w_status." WHERE w_id = ".$w_id;
		$result = mysqli_query($con, $sql);

		if($result != null){
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            Work Requirement Status updated Successfully. <a href='all_work_requests.php' class='alert-link'>Update More Work Requirement Status</a>.
         </div>";
        }else{
            echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
            Technical problem arises. <a href='all_work_requests.php' class='alert-link'>TRY AGAIN</a>.
         </div>";
        }

	}else{
		echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='all_work_requests.php' class='alert-link'>Click here</a> To try again.
        </div>";
	}

?>