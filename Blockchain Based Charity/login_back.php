<?php
	//ob_start();
	session_start();
	include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';

	/*if($con)
		echo "connection success";*/

	$g_email = $_POST['g_email'];
	$g_password = $_POST['g_password'];

	$sql = "SELECT * FROM `government` WHERE g_email like '".$g_email."' AND g_password like '".md5($g_password)."'";
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
		$_SESSION['g_id'] = $row['g_id']; 
		$_SESSION['g_name'] = $row['g_name'];
		$_SESSION['g_email'] = $row['g_email'];
		
		header('Location:index.php');
	}

?>