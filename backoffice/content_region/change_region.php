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
    `id_region`,
    `region`
FROM
    `region`
WHERE
  id = :id
;";


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$row){
    header('Location: revues_acces.php?id='.$_SESSION['id']);
}


?>
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
            <form action="do_change_region.php" method="post">
              <input type="hidden" value="<?=$id?>">
              <h2>Modifier la region <?=$row['region']?></h2>  <tr>
                  <td>
                    <input type="text" name="id_region" id="id_region" value="<?=$row['id_region']?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" id="region" name="region" value="<?=$row['region']?>">
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
      </main>
</body>
</html>
