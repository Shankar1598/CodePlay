<!DOCTYPE html> <!--Integrate index design-->
<html>
<head>
    <title>LogIn</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script type="text/javascript">
        $(function(){
            $('.sub-btn').on('click',function(){
                login();
            });
            $('#userid,#pass').keypress(function(e){
                if(e.which==13){
                    login();
                }
            });
        });
        function login(){
            uid=document.getElementById('user').value;
            pass=document.getElementById('pass').value;
            
            console.log('userid is '+uid+' pass is '+pass);
            $.ajax({
            url:'login_module.php?userid='+uid+'&pass='+pass,
            type: 'GET',
            success: function(data){

                if(data=='success'){
                    window.location.href="instruction.php";
                } else {
                    alert('Incorrect Data');
                }
            }
            });
        }
    </script>
</head>
<body>
    <div class="header">
	    <div class="logo">
           <img src="cyber.png"> 
          </div>
	    <div class="title">Debugging</div>
        <div class="logo"></div>
    </div>
    <div class="login-box">
        <div class="login-content">
            <div class="form-group">
                <label for="userid">User ID :</label><input type="text" name="userid" id="user" />
            </div>
            <div class="form-group">
                <label for="pass">Password :</label><input type="password" name="password" id="pass" />
            </div>
            <div class="form-group">
                <input class="btn sub-btn" type="button" value="Log In" />
            </div>
        </div>
    </div>
</body>
</html>