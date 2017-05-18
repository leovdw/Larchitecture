<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 15:40
 */

// MODIFICATION DE LA REVUES

session_start();
require_once "../connect.php";





$req_modif = "UPDATE
`revues`
SET
  `num_revue`=:num_modif,
  `description`=:desc_modif,
  `couverture`=:couv_modif
WHERE
`id` = :id";

$id = (int) $_POST['id'];

$stmt = $pdo->prepare($req_modif);
$stmt->bindValue(':num_modif', $_POST['num'], PDO::PARAM_INT);
$stmt->bindValue(':desc_modif', $_POST['description'], PDO::PARAM_STR);
$stmt->bindValue(':couv_modif', $_POST['couv'], PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: revues_acces.php?id='.$_SESSION['id']);






