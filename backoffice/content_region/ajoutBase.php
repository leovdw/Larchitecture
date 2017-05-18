<?php
session_start();
require_once '../connect.php';



$sql = "INSERT INTO `region`(`id_region`, `region`) VALUES (:id_region, :region)";

$prep = $pdo->prepare($sql);
$prep->bindValue(':id_region', $_POST['id_region'], PDO::PARAM_INT);
$prep->bindValue(':region', $_POST['region'], PDO::PARAM_STR);
$prep->execute();
header('Location: region_acces.php?id='.$_SESSION['id']);
