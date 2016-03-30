<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name  ="songs";

$conc = mysqli_connect($servername,$username,$password,$db_name);
if(!$conc){
	echo "fail";
}

?>