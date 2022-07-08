<?php
	session_start(); 
    if(!isset($_SESSION['n_id'])){
        header("location: login.php");
    }

	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';

	if(isset($_POST['w_title']) && isset($_POST['w_details']) && isset($_FILES['w_file']['name'])){
		$w_title = mysqli_real_escape_string($con, $_POST['w_title']);
		$w_details = mysqli_real_escape_string($con, $_POST['w_details']);

		$t_time = time();
		
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mimetypePDF = finfo_file($finfo, $_FILES['w_file']['tmp_name']);
		$extPDF = pathinfo($_FILES["w_file"]["name"], PATHINFO_EXTENSION);

		if($mimetypePDF != 'application/pdf'){
			echo "<div class='alert alert-danger alert-dismissible'>
			            <strong>Error!</strong> File should be PDF format. 
			            <a href='add_work_requirement.php' class='alert-link'>Click here</a> To try again.
			        </div>";
		}else{
			$target_dirPDF = "../uploads/work/";
			$fileNamePDF = $t_time . "_" . rand(101,999) . "." . $extPDF;
			$target_filePDF = $target_dirPDF . $fileNamePDF;

			if(move_uploaded_file($_FILES["w_file"]["tmp_name"], $target_filePDF)){
				$sql = "INSERT INTO `work_req`(`n_id`, `w_title`, `w_details`, `w_file`, `w_status`, `w_time`) VALUES (".$_SESSION['n_id'].", '".$w_title."', '".$w_details."', '".$fileNamePDF."', 0, '".time()."')";
				//echo $sql;
				$result = mysqli_query($con, $sql);

				if($result != null){
					echo "<div class='alert alert-success alert-dismissible' role='alert'>
			            Work Added Successfully. <a href='add_work_requirement.php' class='alert-link'>Add More Work</a>.
			         </div>";
				}else{
					echo "<div class='alert alert-danger alert-dismissible'>
			            <strong>Error!</strong> Technical problem arises. 
			            <a href='add_work_requirement.php' class='alert-link'>Click here</a> To try again.
			        </div>";
				}
			}else{
				echo "<div class='alert alert-danger alert-dismissible'>
		            <strong>Error!</strong> Technical problem arises. 
		            <a href='add_work_requirement.php' class='alert-link'>Click here</a> To try again.
		        </div>";
			}
		}
	}else{
		echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='add_work_requirement.php' class='alert-link'>Click here</a> To try again.
        </div>";
	}


?>