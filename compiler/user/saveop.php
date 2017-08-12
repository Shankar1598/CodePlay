<?php
session_start();
require_once("../connect.php");

$user=$_SESSION['username'];
$op=mysqli_real_escape_string($con,$_POST['op']);
$id=$_POST['qid'];
$sql="UPDATE users SET output".$id."='$op' WHERE username='$user';";
if(mysqli_query($con,$sql)){
	die('ok');
} else {
	die('error '.mysqli_error($con)." id is $id and op is $op");
}


?>