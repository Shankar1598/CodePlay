<?php
	session_start();
	$uid=$_SESSION['userid'];
	require_once("connect.php");
	$reg=htmlentities($_GET['reg']);
	$email=htmlentities($_GET['email']);
	$dept='IT';
	//echo $email." ".$reg;
	if(!empty($reg)&&strlen($reg)==12&&substr($reg,0,4)=='4124'&&!empty($email)){
		/*switch(substr($reg,4,0)){
			case :
				$dept=;
				break;
			case :
				$dept=;
				break;
			case :
				$dept=;
				break;
			case :
				$dept=;
				break;
			case :
				$dept=;
				break;
			case :
				$dept=;
				break;
		}*/
		$sql="UPDATE login SET regno='$reg',dept='$dept',email='$email' WHERE userid='$uid'";
		$r=mysqli_query($conn,$sql);
		if($r){
			die('done');
		}
	} else {
		die('nope');
	}
?>