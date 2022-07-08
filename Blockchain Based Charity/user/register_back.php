<?php
	session_start();
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';

	echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';


	if(isset($_POST['u_name']) && isset($_POST['u_email']) && isset($_POST['u_password']) && isset($_POST['u_phone'])){
		$u_name = mysqli_real_escape_string($con, $_POST['u_name']);
		$u_phone = mysqli_real_escape_string($con, $_POST['u_phone']);
		$u_email = mysqli_real_escape_string($con, $_POST['u_email']);
		$u_password = mysqli_real_escape_string($con, $_POST['u_password']);

		if(strlen($u_phone) == 10){
			$sql = "INSERT INTO `user`(`u_name`, `u_phone`, `u_email`, `u_password`) VALUES ('".$u_name."', '".$u_phone."', '".$u_email."', '".md5($u_password)."')";
			$result = mysqli_query($con, $sql);

			if($result != null){
				echo "<div class='alert alert-success alert-dismissible'>
	                <strong>Success!</strong> Registration successful.
	                <a href='login.php' class='alert-link'>Click here</a> To login now.
	            </div>";
			}else{
				echo "<div class='alert alert-danger alert-dismissible'>
	                <strong>Error!</strong> Email ID might be already present.
	                <a href='register.php' class='alert-link'>Click here</a> To try again.
	            </div>";	
			}	
		}else{
			echo "<div class='alert alert-danger alert-dismissible'>
	                <strong>Error!</strong> Phone number must be 10 digit.
	                <a href='register.php' class='alert-link'>Click here</a> To try again.
	            </div>";
		}

		
	}else{
		echo "<div class='alert alert-danger alert-dismissible'>
                <strong>Error!</strong> Parameter missing.
                <a href='register.php' class='alert-link'>Click here</a> To try again.
            </div>";
	}


?>