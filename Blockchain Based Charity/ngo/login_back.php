<?php
	//ob_start();
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$n_email = $_POST['n_email'];
	$n_password = $_POST['n_password'];

	$sql = "SELECT * FROM `ngo` WHERE n_email like '".$n_email."' AND n_password like '".md5($n_password)."'";
	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result) == 0){
		echo '<html><head><title></title>
				<link rel="stylesheet" href="dist/css/main.css">
				<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
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
		$_SESSION['n_id'] = $row['n_id']; 
		$_SESSION['n_name'] = $row['n_name'];
		$_SESSION['n_email'] = $row['n_email'];
		
		header('Location:index.php');
	}

?>