<?php
    session_start();
    require_once('connect.php');
    $userid=$_SESSION['userid'];
    if(!isset($_SESSION['userid'])){
        header("Location:login.php");
        exit();
    }
    
    $sql="SELECT * FROM login WHERE userid='$userid';";
    $res=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($res);
    if($r['regno']!=null){
        header('Location:instruction.php');
    }
?>
<!DOCTYPE html> <!--Integrate index design-->
<html>
<head>
    <title>Regiter</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script type="text/javascript">
        $(function(){
            $('.sub-btn').on('click',function(){
                login();
            });
            $('#reg,#email').keypress(function(e){
                if(e.which==13){
                    login();
                }
            });
        });
        function login(){
            reg=document.getElementById('reg').value;
            email=document.getElementById('email').value;
            $.ajax({
            url:'register_module.php?reg='+reg+'&email='+email,
            type: 'GET',
            success: function(data){
                console.log(data);
                if(data=='done'){
                    window.location='instruction.php';
                } else {
                    alert('Nope!');
                }
            }
            });
        }
    </script>
    <style type="text/css">
        .entry{
            height: 1em !important; 
            width: 8em !important;
        }
        label{
            font-size: 0.9em !important;
        }
    </style>
</head>
<body>
    <div class="header">
	    <div class="logo">&nbsp;</div>
	    <div class="title">M-Apps Test</div>
    	<div class="login-id" id="login-drop">
    		<span>Hi, <span id="userid"><?php echo $userid ?></span><i class="material-icons drop">arrow_drop_down</i></span>
    		<div class="dropdown-content">
    			<p id="logout">Log out</p>
    		</div>
    	</div>
    </div>
    <div class="login-box">
        <div class="login-content">
            <div class="form-group">
                <label for="userid" style="font-size: .9em">Register No.:</label><input class="entry" type="text" name="userid" style="" id="reg" />
            </div>
            <div class="form-group">
                <label for="userid" style="font-size: .9em">E-Mail:</label><input class="entry" type="email" name="" style="" id="email" />
            </div>
            
            <div class="form-group">
                <input class="btn sub-btn" type="button" value="Register" />
            </div>
        </div>
    </div>
</body>
</html>