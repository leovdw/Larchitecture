<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 00:25
 */

session_start();

require_once 'connect.php';

if (isset($_POST['form_connectAdmin'])){

    $lastName_connect = htmlspecialchars($_POST['lastnameConnect']);
    $name_connect = htmlspecialchars($_POST['nameConnect']);
    $passW_connect = sha1($_POST['passW_connect']);

    if (!empty($lastName_connect) AND ! empty($name_connect) AND !empty($passW_connect)){

        $req_user = "SELECT `id`,`prenom`, `nom`, `mot_passe` FROM admin WHERE `prenom`= :lastName_connect AND `nom`= :name_connect AND `mot_passe`=:passW_connect";
        $co_user = $pdo->prepare($req_user);
        $co_user->bindValue(':lastName_connect', $lastName_connect, PDO::PARAM_STR);
        $co_user->bindValue(':name_connect', $name_connect, PDO::PARAM_STR);
        $co_user->bindValue(':passW_connect', $passW_connect, PDO::PARAM_STR);
        $co_user->execute();

        $userExist = $co_user->rowCount();

        if ($userExist == 1){

            $userInfo = $co_user->fetch();
            $_SESSION['id'] = intval($userInfo['id']);
            $_SESSION['prenom'] = $userInfo['prenom'];
            $_SESSION['nom'] = $userInfo['nom'];

            header('location: admin_space.php?id='.$_SESSION['id']);

        } else {
            $erreur = "Votre identifiant ou votre mot de passe est incorrect !!";
        }

    } else {
        $erreur = 'Tout les champs doivent être complétés ';
    }
}


?>


<html>
<head>
    <title>Espace admin</title>
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
</head>
<body>
    <main>
        <div class="connect">
            <h2>Connection à l'espace administrateur</h2>
            <div class="form_co">
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="lastnameConnect" placeholder="prenom">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="nameConnect" placeholder="nom">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="passW_connect" placeholder="mot de passe">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="form_connectAdmin" value="se connecter">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
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
