<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 01:38
 */

require_once '../connect.php';

session_start();



if (isset($_GET['id'])){

    $sql = "SELECT `id`, `num_revue`, `description`, `couverture` FROM revues";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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

    <div class="revue_content">
      <a href="ajout_revue.php">Ajouter une revue</a>
        <table>

            <thead>

            <th>Numero de la revue</th>
            <th>Action</th>
            </thead>

            <?php

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                <tr  align="center">
                    <td>
                        <a><?=$row['num_revue']?></a>
                    </td>
                    <td>
                        <a href="change_revue.php?id=<?=$row['id']?>">Modifier</a>
                        <a href="delete_revue.php?id=<?=$row['id']?>">Supprimer</a>

                    </td>
                </tr>
            <?php } ?>


        </table>

    </div>


    </body>
    </html>


<?php
}
?>
