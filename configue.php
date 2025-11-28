<?php 
$host ="localhost";
$user="root";
$pass="";
$dbname="my_login_db";

$connexion = mysqli_connect($host, $user ,$pass ,$dbname);

if(!$connexion){
    die("connexion failed!");
}
?>
