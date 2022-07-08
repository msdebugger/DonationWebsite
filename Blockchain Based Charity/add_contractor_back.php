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

    if(isset($_POST['c_name']) && isset($_POST['c_email']) && isset($_POST['c_phone']) && isset($_POST['c_password']) && isset($_POST['c_address']) ){

    	$c_name = mysqli_real_escape_string($con, $_POST['c_name']);
        $c_email = mysqli_real_escape_string($con, $_POST['c_email']);
        $c_phone = mysqli_real_escape_string($con, $_POST['c_phone']);
        $c_password = mysqli_real_escape_string($con, $_POST['c_password']);
        $c_address = mysqli_real_escape_string($con, $_POST['c_address']);

        if(strlen($c_phone) == 10){
            $sql = "INSERT INTO `contractor`(`c_name`, `c_phone`, `c_email`, `c_password`, `c_address`) VALUES ('".$c_name."', '".$c_phone."', '".$c_email."', '".md5($c_password)."', '".$c_address."')";
        
            $result = mysqli_query($con, $sql);
            if($result != null){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                Contractor Added Successfully. <a href='add_contractor.php' class='alert-link'>Add More Contractor</a>.
             </div>";
            }else{
                echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                Email ID or phone number already present in system. <a href='add_contractor.php' class='alert-link'>TRY AGAIN</a>.
             </div>";
            }
        }else{
            echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                Phone number must be 10 digit. <a href='add_contractor.php' class='alert-link'>TRY AGAIN</a>.
             </div>";
        }

        
        

    }else{
    	echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='add_contractor.php' class='alert-link'>Click here</a> To try again.
        </div>";
    }


?>