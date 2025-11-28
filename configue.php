<?php 
$host ="sql204.infinityfree.com";
$user="if0_40458001";
$pass="2P8zvP4dcLhL";
$dbname="if0_40458001_epiz_12345678_my_login_db";

$connexion = mysqli_connect($host, $user ,$pass ,$dbname);

if(!$connexion){
    die("connexion failed!");
}
?>
