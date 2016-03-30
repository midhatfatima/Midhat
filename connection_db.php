<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name  ="crud";

$con = mysqli_connect($servername,$username,$password,$db_name);
if(!$con){
	echo "fail";
}

?>