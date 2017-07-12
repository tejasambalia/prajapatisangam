<?php
if($_SERVER['HTTP_HOST']=='www.prajapatisangam.com'||$_SERVER['HTTP_HOST']=='http://www.prajapatisangam.com'){
	if(isset($_POST)){
		$contact = $_POST['contact'];
		if(strlen($_POST['contact'])==10){
			$contact = addslashes($_POST['contact']);
			if(!strstr($contact, '\\')){
				$auth_key = "140349An8oDWzih58972245";	
				$msg = "Thank you for subscribe on PRAJAPATI SANGAM";

				$link = "https://control.msg91.com/api/sendhttp.php?authkey=".$auth_key."&mobiles=".$contact."&message=".$msg."&sender=MT-VPYM&route=1&country=91";
				$res = file_get_contents($link);
				
				include_once "db.php";
				$query = "INSERT INTO subscribe SET contact='".$contact."', audit_created_date='".date('Y-m-d H:i:s')."', audit_ip='".$_SERVER['REMOTE_ADDR']."'";
				$res_select = mysqli_query($con, $query);
			}	
		}
	}
}
header("Location: http://www.prajapatisangam.com");
die();
?>

				