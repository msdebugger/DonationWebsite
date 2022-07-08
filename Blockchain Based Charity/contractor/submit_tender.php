<?php

	session_start(); 
    if(!isset($_SESSION['c_id'])){
        header("location: login.php");
    }

	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';

	if(isset($_POST['w_id']) && isset($_POST['t_price']) && isset($_POST['t_description']) && isset($_FILES['t_file']['name'])){
		$w_id = mysqli_real_escape_string($con, $_POST['w_id']);
		$t_price = mysqli_real_escape_string($con, $_POST['t_price']);
		$t_description = mysqli_real_escape_string($con, $_POST['t_description']);
		$c_id = $_SESSION['c_id'];

		$t_time = time();
		
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mimetypePDF = finfo_file($finfo, $_FILES['t_file']['tmp_name']);
		$extPDF = pathinfo($_FILES["t_file"]["name"], PATHINFO_EXTENSION);

		if($mimetypePDF != 'application/pdf'){
			echo "<div class='alert alert-danger alert-dismissible'>
	            <strong>Error!</strong> File must be PDF. 
	            <a href='index.php' class='alert-link'>Click here</a> To try again.
	        </div>";
		}else{
			$target_dirPDF = "../uploads/tender/";
			$fileNamePDF = $t_time . "_" . rand(101,999) . "." . $extPDF;
			$target_filePDF = $target_dirPDF . $fileNamePDF;

			if(move_uploaded_file($_FILES["t_file"]["tmp_name"], $target_filePDF)){

				$sql = "INSERT INTO `tender`(`w_id`, `c_id`, `t_description`, `t_price`, `t_file`, `t_time`) VALUES (".$w_id.", ".$c_id.", '".$t_description."', '".$t_price."', '".$fileNamePDF."', '".time()."')";
				$result = mysqli_query($con, $sql);

				if($result != null){
					echo "<div class='alert alert-success alert-dismissible' role='alert'>
			            Tender submitted successfully. <a href='index.php' class='alert-link'>Add More Tender</a>.
			         </div>";
				}else{
					echo "<div class='alert alert-danger alert-dismissible'>
			            <strong>Error!</strong> Technical problem arises. 
			            <a href='index.php' class='alert-link'>Click here</a> To try again.
			        </div>";
				}

			}else{
				echo "<div class='alert alert-danger alert-dismissible'>
		            <strong>Error!</strong> Technical problem arises. 
		            <a href='index.php' class='alert-link'>Click here</a> To try again.
		        </div>";
			}
		}

		
	}else{
		echo "<div class='alert alert-danger alert-dismissible'>
	            <strong>Missing!</strong> Parameter missing. 
	            <a href='index.php' class='alert-link'>Click here</a> To try again.
	        </div>";
	}

?>