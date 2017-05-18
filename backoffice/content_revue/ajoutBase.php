
<?php
session_start();
require_once '../connect.php';



$sql = "INSERT INTO
          `revues`(`num_revue`,`description`,`couverture`)
        VALUES
          (:num, :description, :couv)";

$prep = $pdo->prepare($sql);
$prep->bindValue(':num', $_POST['num'], PDO::PARAM_INT);
$prep->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
$prep->bindValue(':couv', $_POST['couv'], PDO::PARAM_STR);
$prep->execute();

header('Location: revues_acces.php?id='.$_SESSION['id']);
