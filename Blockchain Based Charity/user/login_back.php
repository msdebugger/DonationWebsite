<?php
	//ob_start();
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$u_email = $_POST['u_email'];
	$u_password = $_POST['u_password'];

	$sql = "SELECT `u_id`, `u_name`, `u_phone`, `u_email` FROM `user` WHERE u_email like '".$u_email."' AND u_password like '".md5($u_password)."'";
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
		$_SESSION['u_id'] = $row['u_id']; 
		$_SESSION['u_name'] = $row['u_name'];
		$_SESSION['u_email'] = $row['u_email'];
		$_SESSION['u_phone'] = $row['u_phone'];
		
		header('Location:index.php');
	}

?>