<?php
$host=getenv('IP');
$user= 'u367466073_root';
$pass='password';
$db_name="u367466073_debug";
$tbl_name="users";
$con=mysqli_connect($host,$user,$pass,$db_name);
if(!$con){
	die("DB error");
}

?>