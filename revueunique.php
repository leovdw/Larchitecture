<?php
require_once 'backoffice/connect.php';

if (isset($_GET['id'])){
    $num_revue = intval($_GET['id']);
}

$sql = "SELECT `num_revue`, `couverture` FROM `revues` WHERE `num_revue` = :num_revue";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':num_revue', $num_revue, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$inner = "SELECT region.* 
FROM 
`region` 
JOIN 
`revues/region` 
ON 
region.id_region=`revues/region`.id_region 
WHERE 
`revues/region`.num_revues = :id_revues";
$join = $pdo->prepare($sql);
$join->bindValue(':num_revues', $num_revue, PDO::PARAM_INT);
$join->execute();
$data = $join->fetch(PDO::FETCH_ASSOC);

var_dump($data['region']);
die();

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
        <a class="nav-item"  href="index.html">
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


<section class="section is-full is-clearfix revueunik">
    <img src="img-content/couv_<?= $row['num_revue'];?>.jpg" alt="img_couv" class="is-left" style="width: 32%; float: left;padding-top: 3%;">

    <section class="section is-right SforRevue">
        <h1 class="title is-1 "><!-- Region de la revue -->Martinique</h1>
        <h3 class="title is-3"><!-- N° de la revue -->Revue N° <?= $row['num_revue']?></h3>
        <h2 class="subtitle">19 €</h2>

        <p style="padding-top: 2%"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, laboriosam saepe. Adipisci at earum, ipsa itaque iure maxime odio, officiis pariatur perspiciatis quibusdam tempore voluptatem? Animi asperiores ducimus officia quod. </p>
        <div class="tile is-parent" style="padding-top: 10%;    margin-left: 19%;">
            <a class="button is-primary is-right is-medium" href="commande.php" style="margin-right: 3%"> Commander </a>
            <a class="button is-light  is-medium" href="http://fr.calameo.com/read/001121299575d836ff703"> Aperçu </a>
        </div>

    </section>

</section>

<section class="section is-full is-centered">
    <h1 class="title is-1 has-text-centered">
        Region Partenaires Web
    </h1>
    <section class="section" style="width: 80%; margin: 0 auto">
    <h3 class="title is-3" style="padding-top: 5%">Partenaire n°1</h3>
    <p>Descriton</p>

    </section>
</section>
<!-- Section footer -->
<footer class="footer" style="padding-bottom: 0;">
    <nav class="level">
        <div class="level-item has-text-centered">
            <div>
                <a href="index.html" class="heading">Accueil</a>
                <a href="revues.php" class="heading">Nos revues</a>
                <a href="commande.php" class="heading">Commander</a>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <a href="commande.php" class="heading">Abonnement</a>
                <a href="offre.html" class="heading">Appel d'offre</a>
                <a href="contact.html" class="heading">Contact</a>
            </div>
        </div>

        <div class="level-item has-text-centered">
            <div class="field is-grouped">
                <p class="control is-expanded">
                <p class="heading control" style="padding-top: 3%">Newsletter</p>
                <input class="input" type="email" placeholder="exemple@gmail.com">
                </p>
                <p class="control">
                    <a class="button is-primary">
                        Valider
                    </a>
                </p>
            </div>
        </div>
    </nav>
    <div class="content has-text-centered">
        <p style="font-size: 10px">
            © copyright 2017 - Larchitecture | <a href="#">Mentions légales</a>
        </p>
    </div>
</footer>
</body>
</html>