<?php
	session_start();

	if(!isset($_SESSION['u_id'])){
        header("location: login.php");
    }

	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'config.php';
	include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'validate_block.php';
	echo '<html><head><title></title>
				<link rel="stylesheet" href="../dist/css/main.css">
				<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
			</head>
			<body></body>
			</html>';

	function getPreviousHash(){
		global $con;
		$sql = "SELECT d_hash FROM `donation` ORDER BY d_id DESC LIMIT 1";

		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			return $row['d_hash'];
		}else
			return "";
	}

	function updateHash($d_id, $d_hash){
		global $con;
		$sql = "UPDATE donation SET d_hash = '".$d_hash."' WHERE d_id = ".$d_id;
		$result = mysqli_query($con, $sql);
		if($result != null)
			return true;
		else
			return false;
	}


	if(isset($_POST['w_id']) && isset($_POST['t_id']) && isset($_POST['d_amount']) && isset($_POST['d_card_no']) && isset($_POST['d_card_month']) && isset($_POST['d_card_year']) && isset($_POST['d_card_cvv'])){
		$w_id = mysqli_real_escape_string($con, $_POST['w_id']);
		$t_id = mysqli_real_escape_string($con, $_POST['t_id']);
		$d_amount = mysqli_real_escape_string($con, $_POST['d_amount']);
		$d_card_no = mysqli_real_escape_string($con, $_POST['d_card_no']);
		$d_card_month = mysqli_real_escape_string($con, $_POST['d_card_month']);
		$d_card_year = mysqli_real_escape_string($con, $_POST['d_card_year']);
		$d_card_cvv = mysqli_real_escape_string($con, $_POST['d_card_cvv']);
		$u_id = $_SESSION['u_id'];

		$time = time();

		if($d_card_year < date('Y')){
			echo "<div class='alert alert-danger alert-dismissible'>
	            <strong>Missing!</strong> Year cannot be less than current year.
	            <a href='index.php' class='alert-link'>Click here</a> To try again.
	        </div>";
	        exit;
		}

		if(strlen($d_card_no) != 16){
			echo "<div class='alert alert-danger alert-dismissible'>
	            <strong>Missing!</strong> Card number must be 16 digit.
	            <a href='index.php' class='alert-link'>Click here</a> To try again.
	        </div>";
	        exit;
		}

		if(!isBlockValid()){
			echo "<div class='alert alert-danger alert-dismissible'>
		            <strong>Missing!</strong> There is tampering in data. Contat System Admin now.
		            <a href='index.php' class='alert-link'>Click here</a> To try again.
		        </div>";
		}else{
			$prev_hash = getPreviousHash();
			$d_time = time();
			$sql = "INSERT INTO `donation`(`prev_hash`, `u_id`, `w_id`, `t_id`, `d_amount`, `d_card_no`, `d_card_month`, `d_card_year`, `d_card_cvv`, `d_time`) VALUES ('".$prev_hash."', ".$u_id.", ".$w_id.", ".$t_id.", '".$d_amount."', '".$d_card_no."', ".$d_card_month.", ".$d_card_year.", ".$d_card_cvv.", '".$d_time."')";

			$result = mysqli_query($con, $sql);

			if($result != null){
				$d_id = mysqli_insert_id($con);
				//md5($data[$i-1]['d_id']." ".$data[$i-1]['prev_hash']." ".$data[$i-1]['u_id']." ".$data[$i-1]['w_id']." ".$data[$i-1]['t_id']." ".$data[$i-1]['d_amount']." ".$data[$i-1]['d_card_no']." ".$data[$i-1]['d_card_month']." ".$data[$i-1]['d_card_year']." ".$data[$i-1]['d_card_cvv']." ".$data[$i-1]['d_time']);
				$d_hash = md5($d_id." ".$prev_hash." ".$u_id." ".$w_id." ".$t_id." ".$d_amount." ".$d_card_no." ".$d_card_month." ".$d_card_year." ".$d_card_cvv." ".$d_time);
				updateHash($d_id, $d_hash);
				echo "<div class='alert alert-success alert-dismissible' role='alert'>
	            Donation Added Successfully. <a href='index.php' class='alert-link'>Add More Donation</a>.
	         </div>";
			}else{
				echo "<div class='alert alert-danger alert-dismissible'>
	            <strong>Error!</strong> Technical problem arises.
	            <a href='index.php' class='alert-link'>Click here</a> To try again.
	        </div>";
			}
		}
	}else{
		echo "<div class='alert alert-danger alert-dismissible'>
            <strong>Missing!</strong> Parameter Missing. Try again or contact developer.
            <a href='index.php' class='alert-link'>Click here</a> To try again.
        </div>";
	}

?>