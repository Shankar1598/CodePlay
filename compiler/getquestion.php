<?php
require_once("config.inc.php");

$con=mysqli_connect($host, $user, $pass, $db_name);
$id=$_GET['id'];
$sql="SELECT * FROM code WHERE id=$id;"
$res=mysqli_query($con,$sql);
$r=mysqli_fetch_assoc($res);
$data="$r['question']|$r['input']|$r['output']";
die($data);

?>