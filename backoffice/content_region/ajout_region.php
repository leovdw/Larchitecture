<?php



session_start();
require_once '../connect.php';


$id_region = htmlspecialchars($_POST['id_region']);
$region = htmlspecialchars($_POST['region']);


if(!empty($_POST['id_region']) AND !empty($_POST['region'])){

              $req_exist = "SELECT `id_region`, `region` FROM region WHERE `region` = :region_exist";
              $is_exist = $pdo->prepare($req_exist);
              $is_exist->bindValue(':region_exist', $region, PDO::PARAM_STR);
              $is_exist->execute();

              $region_exist = $is_exist->rowCount();

              if ($region_exist == 0){


                  $sql = "INSERT INTO `region`(`id_region`, `region`) VALUES (:id_region, :region)";

                  $prep = $pdo->prepare($sql);
                  $prep->bindValue(':id_region', $id_region, PDO::PARAM_INT);
                  $prep->bindValue(':region', $region, PDO::PARAM_STR);
                  $prep->execute();

                  header('location: region_acces.php?id='.$SESSION['id']);



              }else {
                  $erreur = "La région est déja existante";
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
                      <input type="text" name="id_region" placeholder="id de la region">
                  </td>
                </tr>
                <tr>
                  <td>
                      <input type="text" name="region" placeholder="nom de la region">
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
