<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

// si l'utilisateur a rempli le formulaire
if (isset($_POST['prenom'])){
    //on verifie ca connection
    include 'source/verif_compte.php';

    // si le user a rentrer les bonnes infos
    if (isset($id_nom)){

        //si le user modifie ces information
        if (isset($_POST['new_nom']) && $_POST['new_prenom'] && (strtolower($_POST['new_nom']) != strtolower($_POST['nom']) || strtolower($_POST['new_prenom']) != strtolower($_POST['prenom']))){
            $prepare = $bdd -> prepare('UPDATE ecrivains SET nom = :nom, prenom = :prenom WHERE id_ecrivains = :id_clause ');
            $prepare->bindValue (':nom', strtolower($_POST['new_nom']));
            $prepare->bindValue (':prenom', strtolower($_POST['new_prenom']));
            $prepare->bindValue (':id_clause', $id_nom);
            $res = $prepare -> execute ();

            //deconnect le user de force
            header ( 'Location: account.php');
        }

        //si le user modifie supprime l'accée a son compte
        if (isset($_POST['id_delete'])){
            //on ne supprime pas toutes les data pour éviter d'avoir des articles sans ecrivains
            //on remplace le hash du mdp par " " pour qu'aucun hash mdp puisse convenir et ainsi clore l'accée au compte
            $prepare = $bdd -> prepare('UPDATE ecrivains SET mdp = " " WHERE id_ecrivains = :id_delete;');
            $prepare->bindValue (':id_delete', $id_nom);
            $res = $prepare -> execute ();

            //deconnect le user de force
            header ( 'Location: account.php');
        }

        // si aucun des deux cas est verifier alors on recupére les infos pour les afficher dans les input
        $tab_ecrivains = prepare_fct ($bdd,'fetch', 'SELECT UPPER(nom) as nom, prenom, id_ecrivains FROM Ecrivains WHERE Ecrivains.id_ecrivains = :id',[':id' => $id_nom] );

    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Découvrez toutes les informations relatives à votre compte, y compris vos coordonnées, historique de publication, préférences. Gérez facilement toutes vos informations de compte en un seul endroit.">
    <meta name="keywords" content="Gestion de compte, Données de compte, Historique de commande, Panier d'achat, Préférences de notification, Données de paiement, Coordonnées, Profil utilisateur, Paramètres de compte">
    <meta name="author" content="Souvignet Baudry">

    <link rel="stylesheet" href="https://use.typekit.net/kmv3lzq.css">

    <link rel="shortcut icon" href="img/WLogo.ico" />

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/cssavance.css">
    <link rel="stylesheet" href="css/account.css">

    <link rel="stylesheet" href="css/header.css">
    <script src="js/global.js" defer></script>
    <?php if (isset($id_nom)) { ?>
    <script src="js/filterliste.js" defer></script>
    <?php } ?>
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php'; ?> <!--importation du header-->
<div class="content">

    <!--si le user est deja connecté-->
<?php if (isset($id_nom)) {
            $onlyread = '';
            if ($tab_ecrivains['id_ecrivains'] == '0'){
               $onlyread = 'readonly="readonly"';
               echo '<h1>Connecté sur un compte de test (readonly)</h1>';
            }else{
                echo '<h1>Connecté</h1>';
            }
            ?>
            <!--on remplace les values par les data pour facilité la modifictaion-->
            <form class="form" action="" method="post">
                <!--on ajoute des champ cacher pour renvoyer les id de connection afin de verifier en cas d'action de l'utilisateur-->
                <input type="hidden" name="prenom" value="<?php echo $_POST['prenom'] ?>">
                <input type="hidden" name="nom" value="<?php echo $_POST['nom'] ?>">
                <input type="hidden" name="mdp" value="<?php echo $_POST['mdp'] ?>">


                <label for="nom">Votre nom</label>
                <input <?php echo $onlyread; ?> type="text" id="nom" name="new_nom" value="<?php echo $tab_ecrivains['nom']?>">

                <label for="pre">Votre prenom</label>
                <input <?php echo $onlyread; ?> type="text" name="new_prenom" id="pre" value="<?php echo ucfirst ($tab_ecrivains['prenom'])?>">

                <input type="submit" class="button" value="Enregistrer">
            </form>

            <!--formulaire dedier a la suppression d'informations-->
            <form class="form two" method="post" >
                <!--on ajoute des champ cacher pour renvoyer les id de connection afin de verifier en cas d'action de l'utilisateur-->
                <input type="hidden" name="prenom" value="<?php echo $_POST['prenom'] ?>">
                <input type="hidden" name="nom" value="<?php echo $_POST['nom'] ?>">
                <input type="hidden" name="mdp" value="<?php echo $_POST['mdp'] ?>">
                <input type="hidden" name="id_delete" value="true">

                <input class="button" type="submit" value="Supprimer l'accés a mon compte">
            </form>

            <p>Ne supprime pas les contenu crée.</p>

            <div class="titreContent">
                <h2>Gérer vos amitiés</h2>
                <h3 class="titlebis">Ajouter un ami</h3>
            </div>

            <div class="form">
                <label for="nom">Nom</label>
                <input class="addFriendsInput" type="text" placeholder="<?php echo $_POST['prenom'] ?>" id="addName">

                <label for="addRegion">Region</label>
                <select name="addRegion" id="addRegion"></select>

                <input type="submit" class="button" id="addButton" value="Ajouter un ami"></input>
            </div>
            <div class="titreContent">
                <h3 class="">Filtrer vos amis</h3>
            </div>

            <div class="">
                <input class="flitreCheck" type="checkbox" name="checkboxNord" value="NordE" checked>
                <label for="checkboxNord">Amis au Nord-Est</label>

                <input class="flitreCheck" type="checkbox" name="checkboxSud" value="SudE" checked>
                <label for="checkboxSud">Amis au Sud-Est</label>

                <input class="flitreCheck" type="checkbox" name="checkboxEst" value="NordO" checked>
                <label for="checkboxEst">Amis au Nord-Ouest</label>

                <input class="flitreCheck" type="checkbox" name="checkboxOuest" value="SudO" checked>
                <label for="checkboxOuest">Amis au Sud-Ouest</label>
            </div>

            <div class="">
                <label for="outpoutSelect">Vos amis:</label>
                <select name="outpoutSelect" id="outpoutSelect"></select>
                <input class="button" type="submit" value="Supprimer" id="deleteUser">
            </div>

<?php } else {
?>
        <!--formulaire de connection-->
            <h1>Connectez-vous</h1>
            <?php
            if (isset($_POST['prenom']) && !isset($id_nom)) {
                echo '<p style="color: red;">Les informations sont incorrect. Ecrivez un article au préalable.</p>';
            }
            ?>
            <form class="form connetcion" method="post" action="">

                <label for="nom">Nom</label>
                <input type="text" placeholder="Souvignet" name="nom" id="nom" required>

                <label for="prenom">Prenom</label>
                <input type="text" placeholder="Baudry" name="prenom" id="prenom" required>

                <label for="mdp">Mot de passe</label>
                <input maxlength="30" minlength="10" type="password" placeholder="Votre mot de passe" name="mdp" id="mdp"
                       required>

                <input type="submit" class="button" value="Se connecter">

            </form>
<?php }   ?>
</div>

</body>

<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
