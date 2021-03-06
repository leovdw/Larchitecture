<?php
require_once 'backoffice/connect.php';


$sql = "SELECT `num_revue`, `couverture` FROM `revues`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Larchitecture - contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="nav has-shadow ">
    <div class="nav-left">
        <a class="nav-item" href="index.html">

                <img src="img-layout/logo_larchitecture_sans_fond.png" alt="logo-Larchitecture" style="width: 210px; height: 50px">

        </a>
    </div>
    <div class="nav-center">
        <h1 class="title has-text-centered" style="font-size: 1rem; padding-top: 4%">Toute l'actualité de l'architecture et de la contruction</h1>
    </div>
    <div class="container">

        <span class="nav-toggle is-hidden-desktop nav-right">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </span>
        <div class="nav-right nav-menu is-hidden-tablet-only">
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile" href="index.html">Accueil</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile is-active" href="revues.php">Nos Revues</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile" href="commande.php">Commander</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile" href="offre.html">Appel D'offre</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile " href="contact.html">Contact</a>
            <a class="nav-item is-tab is-hidden-tablet  is-active">Home</a>
            <a class="nav-item is-tab is-hidden-tablet ">Features</a>
            <a class="nav-item is-tab is-hidden-tablet ">Pricing</a>
            <a class="nav-item is-tab is-hidden-tablet ">About</a>
        </div>
    </div>
</nav>


<section class="section is-clearfix frumres">
    <form action="">
    <nav class="panel" id="paneltabsform">

    <div class="panel-block">
        <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="Rechercher">
            <span class="icon is-small is-left">
                <i class="fa fa-search"></i>
            </span>
        </p>
    </div>
        <p class="panel-tabs" >
            <a class="is-active">Dernière sorties</a>
            <a>Toutes nos parutions</a>
        </p>


        <a class="panel-block">
            Region :
            <select class="panel-tabs" name="Région" id="formregion" style="max-height: 100px;overflow: auto ">
            <option value="1">Alsace</option>
            <option value="1">Aquitaine</option>
            <option value="1">Auvergne</option>
            <option value="1">Bourgogne</option>
            <option value="1">Bretagne</option>
            <option value="1">Centre</option>
            <option value="1">Champagne-Ardenne</option>
            <option value="1">Corse</option>
            <option value="1">Franche-Comté</option>
            <option value="1">Ile de France</option>
            <option value="1">Languedoc-Roussillon</option>
            <option value="1">Limousin</option>
            <option value="1">Lorraine</option>
            <option value="1">Midi-Pyrénées</option>
            <option value="1">Nord Pas de Calais</option>
            <option value="1">Normandie</option>
            <option value="1">Pays de la Loire</option>
            <option value="1">Picardie</option>
            <option value="1">Poitou Charentes</option>
            <option value="1">Rhône Alpes</option>
            <option value="1">Guadeloupe</option>
            <option value="1">Guyane</option>
            <option value="1">Martinique</option>
                <option value="1">Réunion</option>
                <option value="1">Belgique / België</option>
                <option value="1">Suisse</option>
        </select>
        </a>



        <button class="button  is-outlined is-fullwidth">
            Go !
        </button>
    </nav>

    </form>
</section>

<section class="section is-ancesto is-clearfix displayres">

    <?php
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>

                        <div class="card" style="width: 237px;float: left;margin: 1rem;">

                            <div class="card-image">
                                <a href="revueunique.php?id=<?= $row['num_revue'];?>"> <!-- Lien Vers la revue  -->
                                    <figure class="image">
                                        <img src="img-content/couv_<?= $row['num_revue']?>.jpg" alt="Image" style="width: 200px;height: 263px;margin: 0 auto"><!-- image revue -->
                                    </figure>
                                </a>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4 has-text-centered">John Smith</p><!-- Nom revue -->
                                    </div>
                                </div>
                                <div class="content is-left" style="float: left">
                                    <p>Revue n°<?= $row['num_revue']?></p><!-- Description Revue (n°)-->
                                </div>
                                <a class="button is-primary is-right is-small" style="float: right" href="commande.php?id=<?= $row['num_revue'];?>"> Commander </a>

                            </div>
                        </div> <!-- A dupliquer pour plus d'élements -->

                    <?php } ?>

    ?>





</section>

</body>
<script>
    var is_active =document.querySelector('.panel-tabs a.is-active');
    var as = document.querySelectorAll('.panel-tabs a');

 for (var i =0 ; i<as.length; i++ ){
     as[i].addEventListener('click', function () {
         var is_active =document.querySelector('.panel-tabs a.is-active');
         var as = document.querySelectorAll('.panel-tabs a');
         as[i].classList.add('is-active');
         is_active.classList.remove('is-active');
     })
 }

</script>
</html>