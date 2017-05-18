<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 00:23
 */


session_start();
require_once 'connect.php';


if (isset($_POST['form_inscritption'])){

    $lastname = htmlspecialchars($_POST['lastname']);
    $name = htmlspecialchars($_POST['name']);
    $password = sha1($_POST['password']);
    $password_confirm = sha1($_POST['password_confirm']);

    if (!empty($_POST['lastname']) AND !empty($_POST['name']) AND !empty($_POST['password']) AND !empty($_POST['password_confirm'])){

        $lastnameLenght = strlen($lastname);
        $nameLenght = strlen($name);

        if($lastnameLenght <= 50){
            if($nameLenght <= 50){
                $req_exist = "SELECT `prenom`, `nom`FROM admin WHERE `prenom` = :lastname_exist AND `nom` = :name_exist";
                $is_exist = $pdo->prepare($req_exist);
                $is_exist->bindValue(':lastname_exist', $lastname, PDO::PARAM_STR);
                $is_exist->bindValue(':name_exist', $name, PDO::PARAM_STR);
                $is_exist->execute();

                $admin_exist = $is_exist->rowCount();

                if ($admin_exist == 0){
                    if ($password == $password_confirm){

                        $sql = "INSERT INTO admin(`prenom`, `nom`, `mot_passe`) VALUES  (:lastname, :name, :password)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
                        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                        $stmt->execute();

                        $erreur = "votre compte à bien été créé";


                    }else {
                        $erreur = "Vos mots de passe ne corespondes pas";
                    }
                }else {
                    $erreur = "Administrateur déja existant";
                }
            } else {
                $erreur = "Votre nom ne dois pas dépasser 50 caractères";
            }
        } else {
            $erreur = "Votre prenom  ne dois pas dépasser 50 caractères";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés";
    };
};


?>





<html>
    <head>
        <title>inscrtption admin</title>
        <link rel="stylesheet" href="style/style.css">
        <meta charset="UTF-8">
    </head>
    <body>
    <main>
      <header>
            <p>Connecté en tant que: <?=  $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></p>
            <a href="admin_space.php?id=<?=$_SESSION['id']?>" id="back_" >Retour à l'espace Administrateur</a>
        </header>
        <div class="insc_form">
            <h2>Ajout d'un nouvel Administrateur</h2>
            <form method="post" action="">
                <table>
                    <tr>
                        <td>
                            <input name="lastname" id="lastname" type="text" placeholder="prenom" value="<?php if (isset($lastname)){echo $lastname;} ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="name" id="name" type="text" placeholder="nom" value="<?php if (isset($name)){echo $name;} ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="password" id="password" placeholder="Mot de passe" type="password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="password_confirm" id="password_confirm" placeholder="Confirmation du mot de passe" type="password">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="submit" name="form_inscritption" id="submit">
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
