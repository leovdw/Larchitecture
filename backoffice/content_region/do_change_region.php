<?php


// MODIFICATION DE LA REVUES

session_start();
require_once "../connect.php";





$req_modif = "UPDATE
`region`
SET
  `id`=:id,
  `id_region` = :id_region;
  `region`=:region_modif
WHERE
`id` = :id";

$id = (int) $_POST['id'];




$stmt = $pdo->prepare($req_modif);
$stmt->bindValue(':region_modif', $_POST['region'], PDO::PARAM_STR);
$stmt->bindValue(':id_region', $_POST['id_region'], PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: region_acces.php?id='.$_SESSION['id']);