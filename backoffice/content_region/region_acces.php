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

    $sql = "SELECT `id`,`id_region`, `region` FROM region";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>

<html>
    <head>
        <title>Backoffice: Revues</title>
        <link rel="stylesheet" href="/archi/backoffice/style/style.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <p>Connecté en tant que: <?=  $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p>
            <a href="../admin_space/<?=$_SESSION['id']?>" id="back_" >Retour à l'espace Administrateur</a>
        </header>
        <main>

    <div class="revue_content">
         <a href="ajout_region.php">Ajouter une region</a>
        <table>

            <thead>

            <th>Region</th>
            <th>Action</th>
            </thead>

        <?php

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
            <tr>
                <td>
                    <a><?=$row['id_region']?></a>
                    <a><?=$row['region']?></a>
                </td>
                <td>
                    <a href="change_region.php?id=<?=$row['id']?>">Modifier</a>
                    <a href="delete_region.php?id=<?=$row['id']?>">Supprimer</a>

                </td>
            </tr>
        <?php } ?>


    </table>
    </body>
    </html>


<?php
}
?>
