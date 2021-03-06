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
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile" href="revues.php">Nos Revues</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile is-active" href="commande.php">Commander</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile" href="offre.html">Appel D'offre</a>
            <a class="nav-item is-tab is-hidden-tablet-only is-hidden-mobile " href="contact.html">Contact</a>
            <a class="nav-item is-tab is-hidden-tablet  is-active">Home</a>
            <a class="nav-item is-tab is-hidden-tablet ">Features</a>
            <a class="nav-item is-tab is-hidden-tablet ">Pricing</a>
            <a class="nav-item is-tab is-hidden-tablet ">About</a>
        </div>
    </div>
</nav>

<!-- Section formulaire -->

<h1 class="title has-text-centered" style="padding-top: 2%;">Formulaire de commande</h1>

<form method="post" action="formulaire.php">

<section class="section is-left formrez">
        <div class="field">
            <label class="label" for="raison-social">Raison social</label>
            <p class="control">
                <input class="input" type="text" id="raison-social" name="raison-social" placeholder="Ex : SA">
            </p>
        </div>
        <div class="field">
            <label class="label" for="activite">Activité</label>
            <p class="control">
                <input class="input" type="text" id="activite" name="activite">
            </p>
        </div>

        <div class="field">
            <label class="label" for="nom">Nom*</label>
            <p class="control">
                <input class="input" type="text" id="nom" name="nom" required>
            </p>
        </div>

        <div class="field">
            <label class="label" for="prenom">Prénom*</label>
            <p class="control">
                <input class="input" type="text" id="prenom" name="prenom" required>
            </p>
        </div>

        <div class="field">
            <label class="label" for="fonction">Fonction</label>
            <p class="control">
                <input class="input" type="text" id="fonction" name="fonction">
            </p>
        </div>

        <div class="field">
            <label class="label" for="adresse">Adresse*</label>
            <p class="control">
                <input class="input" type="text" id="adresse" name="adresse" required>
            </p>
        </div>

        <div class="field">
            <label class="label" for="code-postal">Code postal*</label>
            <p class="control">
                <input class="input" type="text" id="code-postal" name="code-postal" required>
            </p>
        </div>

        <div class="field">
            <label class="label" for="ville">Ville*</label>
            <p class="control">
                <input class="input" type="text" id="ville" name="ville" required>
            </p>
        </div>

        <div class="field">
            <label class="label" for="pays">Pays*</label>
            <p class="control">
                <input class="input" type="text" id="pays" name="pays" required>
            </p>
        </div>

        <div class="field">
            <label class="label" for="telephone">Téléphone*</label>
            <p class="control">
                <input class="input" type="text" id="telephone" name="telephone" placeholder="0687202020" required>
            </p>

        </div>
        <div class="field">
            <label class="label" for="fax">Fax</label>
            <p class="control">
                <input class="input" type="text" id="fax" name="fax">
            </p>
        </div>




</section>
<section class="section is-right formrez_1">

    <img src="img-content/couv_<?=$row['num_revue']?>.jpg" alt="Couv" style="width: 60%; margin: 0 auto; margin-left: 16%">
    <div class="field" style="padding-top: 5%">
        <label class="label" for="email">Adresse e-mail</label>
        <p class="control">
            <input class="input" type="email" id="email" name="email" placeholder="exemple@gmail.com" required>
        </p>
    </div>
    <div class="field">
        <label class="label" for="email2">Vérifiez l'e-mail*</label>
        <p class="control">
            <input class="input" type="email" id="email2" name="email" placeholder="exemple@gmail.com" required>
        </p>

    </div>
    <div class="field" style="padding-top: 4%">
        <label class="label" for="zone-geo">Zone géographique</label>
        <p class="control">
            <span class="select">
                <select id="zone-geo" name="zone-geo">
                    <option value="zone1" class="input" selected>France métropolitaine</option>
                    <option value="zone2">Europe</option>
                    <option value="zone3">DOM</option>
                    <option value="zone4">TOM</option>
                </select>
            </span>
        </p>
    </div>
    <div class="field">
        <label class="label" for="revue">Choix de la revue</label>
        <p class="control">
           <span class="select">
                <select id="revue" name="revue">
                    <option value="<?=$row['num_revue']?>"><?=$row['num_revue']?></option>

                    <option value="283"> 283 </option>
                    <option value="282"> 282 </option>
                    <option value="281"> 281 </option>
                    <option value="280"> 280 </option>
                    <option value="279"> 279 </option>
                    <option value="278"> 278 </option>
                    <option value="277"> 277 </option>
                    <option value="276"> 276 </option>
                    <option value="275"> 275 </option>
                    <option value="274"> 274 </option>
                    <option value="273"> 273 </option>
                    <option value="272"> 272 </option>
                    <option value="271"> 271 </option>
                    <option value="270"> 270 </option>
                    <option value="270"> 270 </option>
                    <option value="269"> 269 </option>
                    <option value="268"> 268 </option>
                    <option value="267"> 267 </option>
                    <option value="266"> 266 </option>
                    <option value="265"> 265 </option>
                    <option value="264"> 264 </option>
                    <option value="264"> 264 </option>
                    <option value="263"> 263 </option>
                    <option value="262"> 262 </option>
                    <option value="261"> 261 </option>
                    <option value="260"> 260 </option>
                    <option value="259"> 259 </option>
                    <option value="258"> 258 </option>
                    <option value="257"> 257 </option>
                    <option value="256"> 256 </option>
                    <option value="255"> 255 </option>
                    <option value="254"> 254 </option>
                    <option value="253"> 253 </option>
                    <option value="252"> 252 </option>
                    <option value="251"> 251 </option>
                    <option value="250"> 250 </option>
                    <option value="249"> 249 </option>
                    <option value="249"> 249 </option>
                    <option value="248"> 248 </option>
                    <option value="245"> 245 </option>
                    <option value="244"> 244 </option>
                    <option value="243"> 243 </option>
                    <option value="242"> 242 </option>
                    <option value="241"> 241 </option>
                    <option value="240"> 240 </option>
                    <option value="239"> 239 </option>
                    <option value="238"> 238 </option>
                    <option value="238"> 238 </option>
                    <option value="237"> 237 </option>
                    <option value="236"> 236 </option>
                    <option value="235"> 235 </option>
                    <option value="234"> 234 </option>
                    <option value="233"> 233 </option>
                    <option value="232"> 232 </option>
                    <option value="231"> 231 </option>
                    <option value="230"> 230 </option>
                    <option value="229"> 229 </option>
                    <option value="228"> 228 </option>
                    <option value="227"> 227 </option>
                    <option value="226"> 226 </option>
                    <option value="225"> 225 </option>
                    <option value="223"> 223 </option>
                    <option value="222"> 222 </option>
                    <option value="221S"> 221S </option>
                    <option value="221N"> 221N </option>
                    <option value="220"> 220 </option>
                    <option value="219SM"> 219SM </option>
                    <option value="219SB"> 219SB </option>
                    <option value="218"> 218 </option>
                    <option value="217N"> 217N </option>
                    <option value="217N"> 217N </option>
                    <option value="216"> 216 </option>
                    <option value="215"> 215 </option>
                    <option value="214"> 214 </option>
                    <option value="213S"> 213S </option>
                    <option value="213N"> 213N </option>
                    <option value="211"> 211 </option>
                    <option value="210"> 210 </option>
                    <option value="209"> 209 </option>
                    <option value="208"> 208 </option>
                    <option value="207"> 207 </option>
                    <option value="206"> 206 </option>
                    <option value="205"> 205 </option>
                    <option value="204"> 204 </option>
                    <option value="203"> 203 </option>
                    <option value="202"> 202 </option>
                    <option value="201"> 201 </option>
                    <option value="200"> 200 </option>

                </select>
            </span>
        </p>
    </div>
    <div class="field">
        <label class="label" for="quantite">Quantité</label>
        <p class="control">
            <span class="select">
                <select id="quantite" name="quantite">
                    <option value="quantite1" selected>1</option>
                    <option value="qunatite5">5</option>
                    <option value="quantite10">10</option>
                    <option value="quantite20">20</option>
                </select>
            </span>
        </p>
    </div>
    <button class="button is-primary butonform" type="submit" >Envoyer</button>
</section>
</form>
    <!-- Section tableau prix -->
    <section class="table is-bordered is-striped is-narrow section" style="width: 100%">
            <p class="title is-4" style="clear: left">Tarif en euro</p>
            <table class="table">
                <thead>
                <tr>
                       <th>Quantité</th>
                        <th>1</th>
                        <th>5</th>
                        <th>10</th>
                        <th>20</th>
                    </tr>
            </thead>
                <tbody>
                <tr>
                        <th>France</th>
                        <td>19 € + 3 € (frais de port)</td>
                        <td>75 € + 15 € (frais de port)</td>
                        <td>155 € + 30 € (frais de port)</td>
                        <td>240 € + 60 € (frais de port)</td>
                    </tr>
                <tr>
                        <th>DOM</th>
                        <td>19 € + 8 € (frais de port)</td>
                        <td>75 € + 30 € (frais de port)</td>
                        <td>155 € + 60 € (frais de port)</td>
                        <td>240 € + 80 € (frais de port)</td>
                    </tr>
                <tr>
                        <th>TOM</th>
                        <td>19 € + 10 € (frais de port)</td>
                        <td>75 € + 45 € (frais de port)</td>
                        <td>155 € + 85 € (frais de port)</td>
                        <td>240 € + 130 € (frais de port)</td>
                    </tr>
               <tr>
                        <th>Europe</th>
                        <td>19 € + 8 € (frais de port)</td>
                        <td>75 € + 30 € (frais de port)</td>
                        <td>155 € + 60 € (frais de port)</td>
                        <td>240 € + 80 € (frais de port)</td>
</tr>
           </tbody>
            </table>

            <p class="title is-4">Tarif en franc Suisse</p>
            <table class="table">
                <thead>
                <tr>
                        <th>Quantité</th>
                        <th>1</th>
                        <th>5</th>
                        <th>10</th>
                        <th>20</th>
                    </tr>
            </thead>
                <tbody><tr>
                    <th>France</th>
                    <td>22.99 CHF + 3.63 CHF (frais de port)</td>
                    <td>90.75 CHF + 15 CHF (frais de port)</td>
                    <td>187.55 CHF + 36.30 CHF (frais de port)</td>
                    <td>290.40 CHF+ 72.60 CHF (frais de port)</td>
                </tr><tr>
                    <th>DOM</th>
                    <td>22.99 CHF + 9.68 CHF (frais de port)</td>
                    <td>90.75 CHF + 36.30 CHF (frais de port)</td>
                    <td>187.55 CHF + 72.60 CHF (frais de port)</td>
                    <td>290.40 CHF+  96.8 CHF (frais de port)</td>
                </tr><tr>
                        <th>TOM</th>
                        <td>22.99 CHF + 12.10 CHF (frais de port)</td>
                        <td>90.75 CHF + 15 CHF (frais de port)</td>
                        <td>187.55 CHF + 102.85 CHF (frais de port)</td>
                        <td>290.40 CHF+ 157.30 CHF (frais de port)</td>
                    </tr>
                <tr>
                        <th>Europe</th>
                        <td>22.99 CHF + 9.68 CHF (frais de port)</td>
                        <td>90.75 CHF + 36.30 CHF (frais de port)</td>
                        <td>187.55 CHF + 72.60 CHF (frais de port)</td>
                        <td>290.40 CHF+  96.8 CHF (frais de port)</td>
                    </tr>
            </tbody>
            </table>
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
