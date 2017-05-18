<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 01:03
 */

session_start();

require_once 'connect.php';



if (isset($_GET['id']) AND $_GET['id'] > 0){

    $getId = intval($_GET['id']);



    $req_user = "SELECT `id`,`prenom`, `nom`, `mot_passe` FROM admin WHERE `id` = :id_user";
    $user = $pdo->prepare($req_user);
    $user->bindValue(':id_user', $getId, PDO::PARAM_STR);
    $user->execute();

    $userInfo = $user->fetch();



    //  listage des administrateurs du site

    $admin = "SELECT `id`, `prenom`, `nom` FROM admin";
    $ls_admin = $pdo->prepare($admin);
    $ls_admin->execute();



?>

<html>
    <head>
        <title>Espace admin</title>
        <link rel="stylesheet" href="style/style.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
          <p>Connecté en tant que: <?=  $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p>
        </header>
        <main>
            <div class="div_wrap">
                <div class="ls_admin">
                    <h3>Liste des Administrateurs</h3>
                    <?php

                    while($row = $ls_admin->fetch(PDO::FETCH_ASSOC)){?>
                        <table>
                            <tr>
                                <?php
                                if ($row['id'] == $_SESSION['id']){
                                    ?>
                                    <td>
                                        <p><?=$row['prenom'].' '.$row['nom']?> // Actuellement connecté</p>
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td>
                                        <p><?=$row['prenom'].' '.$row['nom']?></p>
                                    </td>
                                    <td>
                                        <a href="delete_admin.php?id=<?=$row['id']?>">Supprimer</a>
                                    </td>
                                    <?php
                                }
                                ?>

                            </tr>
                        </table>

                    <?php } ?>



                </div>
                <div class="option">
                    <?php

                    if (isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id']) {
                        ?>

                        <a href="deconnection.php">Se deconnecter</a><br>
                        <a href="inscription.php">Ajouter un nouvel admin</a><br>

                        <a href="content_revue/revues_acces.php?id=<?=$getId?>">Accedéer aux modification des revues</a><br>
                        <a href="content_region/region_acces.php?id=<?=$getId?>">Accedéer aux modification des region</a>
                        <?php
                    }
                    ?>
                </div>
           </div>
        </main>




    </body>
</html>

<?php
} else {
    header('location: connect_admin.php');
}


?>
