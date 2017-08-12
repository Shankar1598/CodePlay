<?php
session_start();
if(!isset($_SESSION['username']))
{header('Location:../index.php');}
else{$user=$_SESSION['username'];}
?>
<html>
	<head>
		<title>Online Compiler for Off-Campus Students</title>
			<meta name="keywords" content="BITS,OffCampus,Pilani,Compiler,WILPD" />
			
			<link rel="stylesheet" type="text/css" href="../styles/style.css" />		
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      		rel="stylesheet">
			<script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
			<script type="text/javascript" src="../js/compile.js"></script>
			<script type="text/javascript" src="../js/tab.js"></script>
			<script type="text/javascript" src="../js/jquery.form.js"></script>
			<script src="../jquery-linedtextarea.js"></script>
			<link href="../jquery-linedtextarea.css" type="text/css" rel="stylesheet" />
			<script type="text/javascript">
			window.addEventListener('blur', function() {
   				//document.location='instruction.php';
			});
				$(document).ready(function() { 
					var i=1;
					console.log("doc ready"); 
					width=0;
					var intr=setInterval(progress,1);
					function progress(){
					if(width>=100){
						clearInterval(intr);
						save(alert('Hurry up!!'));
						//window.location='thankyou.php';
					} else {
						width+=0.00083333333;
						document.getElementById('timer').style.width=width+"%";
					}
					}
				});
				function save(qid,callback){
					op=document.getElementById('output').value;
					console.log(op);
					$.ajax({
						url: '../saveop.php?qid=2&op='+op,
						type: 'POST',
						data: 'qid'+i+'op='+op,
						success: function(data){
							console.log("saved "+data);
						}
					});
					if(typeof callback === 'function'){
                		callback(i);
            		}
				}
$("#nxtbtn").on('click',function(){
	saveop();
});







			</script>
			<style type="text/css">
				#content{
					position: absolute;
					top: 15%;
					right: 3%;
				}
				#code-box{
					padding: 3%;
				}
				.ques{
					position: absolute;
					top: 15%;
					left: 3%;

				}
				.ques table{
					width: 45vw;
					padding: 3%;
				}
			</style>
	</head>

	<body>
	<div id="whole">
	<div class="header">
	<a href=""><div class="logo">&nbsp;</div></a>
	<div class="title">Debugging - Prelims</div>
	</div>
	<div class="timer-box">
	<div class="timer" id="timer">
		<span class=""></span>
	</div>
</div>
<div class="footer">
	<a href="code.php" onclick="saveop();"><button class="btn fl" id="backbtn">Back</button></a>
	<button class="btn fr rbtn" id="nxtbtn" onclick="" >Next</button>
</div>
<script>
	$('#nxtbtn').click(function(){
		console.log("inside save");
					op=document.getElementById('output').innerHTML;
					//alert(op);
					$.ajax({
						url: 'saveop.php',
						type: 'POST',
						data: 'qid=2&op='+op,
						success: function(data){
							console.log(data);
							if(data='ok'){
								window.location='code3.php';
							}
						}
					});
	});
</script>
</div>
<div class="ques">
	<table>
		<tbody>
			<tr>
				<td id="q-box">
<strong>Problem 2</strong><br><br>
Alphabets a-z(only small) are assigned a number from 1 to 26.<br><br>
a=1,b=2…..z=26.A number is given as input, write a program to print the ways in which they can be decoded.<br><br>
<b>Input:</b> an inter value given as input  1<=a<=10000000<br><br>
<b>Output:</b> number of possible ways  the code can be decode<br><br>
<b>Sample1:</b> <br><br>
<b>Input:</b> 121<br><br>
<b>Output:</b> 3<br><br>
<b>Explanation:</b> <br><br>
1=a,2=b,1=a aba (1st possibility)<br><br>
12=l,1=a la (2nd possibility)<br><br>
1=a,21=u au(3rd possibilility)<br><br>

				</td>
			</tr>
		</tbody>
	</table>
</div>
		<div id="content">
			
			<table id="code-box" class="code">
				<td class="code">
				<form action="compile.php" method="post" id="form">
					
					Select Language of Interest:
						<select name="language" id="language">
							<option value="c">C</option>
							<option value="cpp">C++</option>
							<option value="java">Java</option>
							<option value="python2.7">Python</option>
							<option value="python3.2">Python3</option>
						</select>
					<br /><br />
					<strong>Enter Your code here:<br/></strong>
					<textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code" class="lined"></textarea><br/>
					<span id="errorCode" class="error"></span><br/><br/>
					<strong>Sample Input please:<br/></strong>
					<textarea name="input" rows=7 cols=100 id="input"></textarea><br/><br/>
					<input type="submit" value="Submit" id="submit">
					<input type="reset" value="Reset"><br/>
				</form>
				</td>
				
			<tr>
			<td class="code"><strong>Output:</strong>
			<span id="output"></span><br/></td>
			
			</tr>
		</div>
	</div>
	
	</body>
</html>
