<html>
	<head>
		<title>Online Compiler</title>
		<meta name="keywords" content="Online,Compiler,Online Compiler" />
		<link rel="shortcut icon" href="styles/favicon.ico" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="styles/style.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<style type="text/css">
		.error{
			position: absolute;
			left: 40%;
			top: 70%;
			font-size: 1.5em;
		}
	</style>

	<body>
	<div id="whole">
			<div class="header">
	    		<div class="logo">&nbsp;</div>
	    		<div class="title">Debugging</div>
    		</div>		
		<div id="content">
			<?php
			session_start();
			 
			if(isset($_SESSION['username']))
			{
				$folder=$_SESSION['username'];
				//header("Location: ./$folder/");
			}
			?>

    <div class="login-box">
        <form class="login-content" action="checklogin.php" method="post">
            <div class="form-group">
                <label for="userid">User ID :</label><input type="text" name="username" id="user" />
            </div>
            <div class="form-group">
                <label for="pass">Password :</label><input type="password" name="password" id="pass" />
            </div>
            <div class="form-group">
                <input class="btn sub-btn" type="submit" value="Log In" />
            </div>
        </form>
    </div>

			<div id="login_portal" hidden>
			<form action="checklogin.php" method="post">
			<table width="300" border="0" cellspacing="0" cellpadding="2">
			<tr><td>Username<td><td>:<td><td><input type="text" name="username"><td></tr>
			<tr><td>Password<td><td>:<td><td><input type="password" name="password"><td></tr>
			<tr><td colspan="2"><center><input type="submit" value="Login" /></center></td></tr>
			<?php if(isset($_GET['login_attempt']) and ($_GET['login_attempt']==1)) {?>
			<font color="red" class="error">Bad Login or Password. Please try again. <br/></font>
			<?php }?>
			</table>
			</form>
			</div>
		</div>
		
	</div>
	</body>
</html>

