<?php

session_start();
require_once '../connect.php';


$num = htmlspecialchars($_POST['num']);
$description = htmlspecialchars($_POST['description']);
$couv = htmlspecialchars($_POST['couv']);


if(!empty($_POST['num']) AND !empty($_POST['description']) AND !empty($_POST['couv'])){

    $req_exist = "SELECT `num_revue` FROM revues WHERE `num_revu` = :num_exist";
    $is_exist = $pdo->prepare($req_exist);
    $is_exist->bindValue(':num_exist', $num, PDO::PARAM_STR);
    $is_exist->execute();

    $num_exist = $is_exist->rowCount();

    if ($num_exist == 0){


        $sql = "INSERT INTO
          `revues`(`num_revue`,`description`,`couverture`)
        VALUES
          (:num, :description, :couv)";

        $prep = $pdo->prepare($sql);
        $prep->bindValue(':num', $num, PDO::PARAM_INT);
        $prep->bindValue(':description', $description, PDO::PARAM_STR);
        $prep->bindValue(':couv', $couv, PDO::PARAM_STR);
        $prep->execute();

        header('Location: revues_acces.php?id='.$_SESSION['id']);



    }else {
        $erreur = "La revue est déja existante";
    }
} else {
    $erreur = "Tous les champs doivent être complétés";
};

?>





<html>
    <head>
        <title>Backoffice: Revues</title>
        <link rel="stylesheet" href="../style/style.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <p>Connecté en tant que: <?=  $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p>
            <a href="../admin_space.php?id=<?=$_SESSION['id']?>" id="back_" >Retour à l'espace Administrateur</a>
        </header>
        <main>
          <div class="change">
            <form action="" method="post">
              <h2>ajouter une revue</h2>
              <table>
                <tr>
                  <td>
                      <input type="text" name="num" placeholder="numero de revue">
                  </td>
                </tr>
                <tr>
                  <td>
                      <input type="text" name="description" placeholder="description">
                  </td>
                </tr>
                <tr>
                  <td>
                      <input type="text" name="couv" placeholder="couverture.jpg">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="submit" >
                  </td>
                </tr>

              </table>
            </form>

              <?php
              if (isset($erreur)){
                  ?>
                  <p class="error"><?= $erreur ?></p>
                  <?php
              }
              ?>

          </div>
        </main>
  </body>
</html>
