<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 10:36
 */

session_start();
$id_admin = $_SESSION['id'];

require_once "connect.php";

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    if ($id == $_SESSION['id']){
        echo "il est strictement interdit de s'auto-supprimer !!! Demander la procuration à un autre administrateur SORRY";
        die();
    }
} else {
    header('Location: detail.php');
}
$sql = "DELETE FROM
    `admin`
WHERE
  id = :id
;";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
header('Location: admin_space.php?id='.$id_admin);
