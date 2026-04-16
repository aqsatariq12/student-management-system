<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "student_management";

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
die("DB connection Failed");
}
?>