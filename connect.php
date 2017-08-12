<?php

$ip= getenv('IP');
$uname= 'u367466073_root';
$pass='password';
$db='u367466073_debug';

$conn=mysqli_connect($ip,$uname,$pass,$db);

if(!$conn){
	die('connection error');
}
 
?>