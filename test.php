<?php
	session_start();
	require_once('connect.php');
	
	if(isset($_SESSION['userid'])){
		$user=$_SESSION['userid'];
	} else {
		header("Location:login.php");
		exit();
	}
    $sql="SELECT * FROM login WHERE userid='$user';";
    $res=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($res);
    if($r['test_complete']==1){
    	header('Location:thankyou.php');
    	exit();
    }
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Debugging - Prelims</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
window.addEventListener('blur', function() {
   document.location='instruction.php';
});
		
		
		$(function(){
			width=0;
			var intr=setInterval(progress,1);
			function progress(){
				if(width>=100){
					clearInterval(intr);
					save(alert('Time up!!'));
					window.location='thankyou.php';
				} else {
					width+=0.00083333333; //30min
					document.getElementById('timer').style.width=width+"%";
				}
			}
		});
		
		$(document).on("click","#login-drop",function(){
			$("#login-drop-box").css("width","");
		});
		$(document).on("click","#logout",function(){
			window.location="logout.php";
		});
	</script>
</head>
<body>
<div class="header">
	<a href="/"><div class="logo">&nbsp;</div></a>
	<div class="title">Debugging - Prelims</div>
	<div class="login-id" id="login-drop">
		<span>Hi, <span id="userid"><?php echo $user ?></span><i class="material-icons drop">arrow_drop_down</i></span>
	</div>
</div> 
<div class="container">
	<div class="q-group">
		<div id="question">1. Dude what up? I've been watchin memez in facebook lately wanna tag you in somethin cool? (An error has occured mate..!)</div>
	</div>
	<div class="num">
		<span id="qno">1</span>
	</div>
</div>
<div class="options">
	<div class="option" id='op1'><input type="radio" name="ans" value='1' />  Ok Bruh!</div>
	<div class="option" id='op2'><input type="radio" name="ans" value='2' />  Ok Bruh!</div>
	<div class="option" id='op3'><input type="radio" name="ans" value='3' />  Ok Bruh!</div>
	<div class="option" id='op4'><input type="radio" name="ans" value='4' />  Ok Bruh!</div>
</div>
<div class="timer-box">
	<div class="timer" id="timer">
		<span class=""></span>
	</div>
</div>
<div class="footer">
	<button class="btn fl" id="backbtn">Back</button>
	<button class="btn fr rbtn" id="nxtbtn">Next</button>
</div>
</body>
</html>