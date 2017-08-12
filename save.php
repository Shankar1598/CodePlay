<?php
session_start();

$uid=$_GET["uid"]; 
//die("uid is".$uid);
require_once("connect.php");
$qno=30;

$json=file_get_contents("php://input");
$data=json_decode($json,true);
//die("Got json");
$sum=0;

for($i=0;$i<$qno;$i++){
    $sum=$sum+$data[$i]['res'];
}


$sql="UPDATE login SET mark=$sum, test_complete=1 WHERE userid='$uid';";
$res=mysqli_query($conn,$sql);
if($res){
    die("done");
} else {
    die("sql error ".mysqli_error($conn));
 }

?>