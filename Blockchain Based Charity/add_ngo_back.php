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

    if(isset($_POST['n_name']) && isset($_POST['n_email']) && isset($_POST['n_phone']) && isset($_POST['n_password']) && isset($_POST['n_address']) ){

    	$n_name = mysqli_real_escape_string($con, $_POST['n_name']);
        $n_email = mysqli_real_escape_string($con, $_POST['n_email']);
        $n_phone = mysqli_real_escape_string($con, $_POST['n_phone']);
        $n_password = mysqli_real_escape_string($con, $_POST['n_password']);
        $n_address = mysqli_real_escape_string($con, $_POST['n_address']);

        if(strlen($n_phone) == 10){
            $sql = "INSERT INTO `ngo`(`n_name`, `n_phone`, `n_email`, `n_password`, `n_address`) VALUES ('".$n_name."', '".$n_phone."', '".$n_email."', '".md5($n_password)."', '".$n_address."')";
        
            $result = mysqli_query($con, $sql);
            if($result != null){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                NGO Added Successfully. <a href='add_ngo.php' class='alert-link'>Add More NGO</a>.
             </div>";
            }else{
                echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                Email ID or phone number already present in system. <a href='add_NGO.php' class='alert-link'>TRY AGAIN</a>.
             </div>";
            }
        }else{
            echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                Phone number must be 10 digit. <a href='add_NGO.php' class='alert-link'>TRY AGAIN</a>.
             </div>";
        }

        
        

    }else{
    	echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='add_ngo.php' class='alert-link'>Click here</a> To try again.
        </div>";
    }


?>