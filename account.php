<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

if (isset($_POST['prenom'])){
    include 'source/verif_compte.php';

    if (isset($id_nom)){
        // Requête SQL pour récupérer toutes les info de l'utilisateur

        $tab_ecrivains = prepare ($bdd,'fetch', 'SELECT UPPER(nom) as nom, prenom FROM Ecrivains WHERE Ecrivains.id_ecrivains = :id',[':id' => $id_nom] );


       /* $requete_prepare = $bdd->prepare ( 'SELECT UPPER(nom) as nom, prenom FROM Ecrivains WHERE Ecrivains.id_ecrivains = :id' );
        $requete_prepare->bindValue ( ':id' , $id_nom , PDO::PARAM_INT );
        $requete_prepare->execute ();
        $tab_ecrivains = $requete_prepare->fetch( PDO::FETCH_ASSOC );
        $requete_prepare -> closeCursor ();*/
    }
}


// Requête SQL pour récupérer toutes les infos du user


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

    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/header.css">
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php'; ?> <!--importation du header-->
<div class="content">

<?php
var_dump ($_POST);
if (!isset($_POST['prenom']) ){?>
    <h1>Connectez-vous</h1>
    <form class="connetcion" method="post" action="">

        <label for="nom">Nom</label>
        <input type="text" placeholder="Souvignet" name="nom" id="nom" required>

        <label for="prenom">Prenom</label>
        <input type="text" placeholder="Baudry" name="prenom" id="prenom" required>

        <label for="mdp">Mot de passe</label>
        <input maxlength="30" minlength="10" type="password" placeholder="Votre mot de passe" name="mdp" id="mdp" required>

        <input type="submit" class="button" value="Se connecter">

    </form>

<?php } else if (isset($id_nom)) { ?>

<section>
    <h1>Connecté</h1>
    <form action="">
        <label for="">Votre nom</label>
        <input type="text" value="<?php echo $tab_ecrivains['nom']?>">

        <label for="">Votre prenom</label>
        <input type="text" value="<?php echo ucfirst ($tab_ecrivains['prenom'])?>">

        <input type="submit" class="button" value="Enregistrer">
    </form>

    <a href="" class="button">Supprimer l'accés a mon compte</a>

</section>

<?php } ?>
</div>

</body>

<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
