<?php
	//session_start();
	include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';

	function isBlockValid(){
		//Remaining
		global $con;
		$sql = "SELECT * FROM donation";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result)>0){
			$data = array();
			while($row = mysqli_fetch_assoc($result))
				array_push($data, $row);

			$flag = true;
			//echo "<br/>";
			for($i=1; $i<sizeof($data); $i++){
				$v_hash = $data[$i]['d_hash'];
				
				$v_hash_compute = md5($data[$i]['d_id']." ".$data[$i]['prev_hash']." ".$data[$i]['u_id']." ".$data[$i]['w_id']." ".$data[$i]['t_id']." ".$data[$i]['d_amount']." ".$data[$i]['d_card_no']." ".$data[$i]['d_card_month']." ".$data[$i]['d_card_year']." ".$data[$i]['d_card_cvv']." ".$data[$i]['d_time']);
				//echo $v_hash."  ==  ".$v_hash_compute."<br/>";
				if(strcmp($v_hash, $v_hash_compute) != 0){
					$_SESSION['d_id'] = $data[$i]['d_id'];
					$flag = false;
					break;
				}

				$prev_hash = $data[$i]['prev_hash'];
				$prev_hash_compute = md5($data[$i-1]['d_id']." ".$data[$i-1]['prev_hash']." ".$data[$i-1]['u_id']." ".$data[$i-1]['w_id']." ".$data[$i-1]['t_id']." ".$data[$i-1]['d_amount']." ".$data[$i-1]['d_card_no']." ".$data[$i-1]['d_card_month']." ".$data[$i-1]['d_card_year']." ".$data[$i-1]['d_card_cvv']." ".$data[$i-1]['d_time']);
				//$prev_hash_compute = md5($data[$i-1]['t_id']." ".$data[$i-1]['prev_hash']." ".$data[$i-1]['d_id']." ".$data[$i-1]['t_details']." ".$data[$i-1]['p_id']." ".$data[$i-1]['t_time']);
				//echo $prev_hash."  ==  ".$prev_hash_compute."<br/><br/>";
				if(strcmp($prev_hash, $prev_hash_compute) != 0){
					$_SESSION['d_id'] = $data[$i-1]['d_id'];
					$flag = false;
					break;
				}
			}
			return $flag;
		}else{
			return true;
		}
	}

?>