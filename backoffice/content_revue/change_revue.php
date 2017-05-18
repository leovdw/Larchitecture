<?php
session_start();
require_once "../connect.php";

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
} else {
    header('Location: revues_acces.php');
}
$sql = "SELECT
    `id`,
    `num_revue`,
    `description`,
    `couverture`
FROM
    `revues`
WHERE
  id = :id
;";


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$row){
    header('revues_acces.php?id='.$_SESSION['id']);
}


?>
<!doctype html>

<html>
    <head>
        <link rel="stylesheet" href="../style/style.css">
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Modifier la revue <?=$row['num_revue']?></title>
    </head>
    <body>
        <header>
            <p>Connecté en tant que: <?=  $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p>
            <a href="../admin_space.php?id=<?=$_SESSION['id']?>" id="back_" >Retour à l'espace Administrateur</a>
        </header>
        <main>
          <div class="change">
            <form action="do_change.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <h2>Modifier la revue <?=$row['num_revue']?></h2>
                <table>
                  <tr>
                    <td>
                      <input type="text" id="num" name="num" value="<?=$row['num_revue']?>">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" id="descripion" name="description" value="<?=$row['description']?>">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" id="couv" name="couv" value="<?=$row['couverture']?>">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="submit">
                    </td>
                  </tr>
                </table>






            </form>
          </div>

</body>
</html>
