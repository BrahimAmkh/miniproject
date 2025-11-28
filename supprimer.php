<?php
include "configue.php";

$id = $_GET['id'];

$sql = "DELETE FROM produits WHERE id=$id";
$connexion->query($sql);

header("Location: admin.php");
exit();
