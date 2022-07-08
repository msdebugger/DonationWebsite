<?php
	//ob_start();
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$c_email = $_POST['c_email'];
	$c_password = $_POST['c_password'];

	$sql = "SELECT * FROM `contractor` WHERE c_email like '".$c_email."' AND c_password like '".md5($c_password)."'";
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';
		echo "<div class='alert alert-danger alert-dismissible'>
                <strong>Error!</strong> Please check email ID and password you have entered.
                <a href='login.php' class='alert-link'>Click here</a> To try again.
            </div>";
	}else{
		//ob_start();
		$row = mysqli_fetch_assoc($result);
		$_SESSION['c_id'] = $row['c_id']; 
		$_SESSION['c_name'] = $row['c_name'];
		$_SESSION['c_email'] = $row['c_email'];
		
		header('Location:index.php');
	}

?>