<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 10:36
 */

session_start();

require_once "../connect.php";

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];

} else {
    header('Location: revues_acces.php');
}
$sql = "DELETE FROM
    `revues`
WHERE
  id = :id
;";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
header('Location: revues_acces.php?id='.$_SESSION['id']);
