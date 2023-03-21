<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

if (isset($_POST['prenom'])){
    include 'source/verif_compte.php';
    if (isset($id_nom)){
        // Requête SQL pour récupérer toutes les info de l'utilisateur
        if (isset($_POST['new_nom']) && $_POST['new_prenom'] && (strtolower($_POST['new_nom']) != strtolower($_POST['nom']) || strtolower($_POST['new_prenom']) != strtolower($_POST['prenom']))){
            $prepare = $bdd -> prepare('UPDATE ecrivains SET nom = :nom, prenom = :prenom WHERE id_ecrivains = :id_clause ');
            $prepare->bindValue (':nom', strtolower($_POST['new_nom']));
            $prepare->bindValue (':prenom', strtolower($_POST['new_prenom']));
            $prepare->bindValue (':id_clause', $id_nom);
            $res = $prepare -> execute ();

            header ( 'Location: account.php');
        }

        if (isset($_POST['id_delete'])){
            $prepare = $bdd -> prepare('UPDATE ecrivains SET mdp = " " WHERE id_ecrivains = :id_delete;');
            $prepare->bindValue (':id_delete', $id_nom);
            $res = $prepare -> execute ();

            header ( 'Location: account.php');
        }

        $tab_ecrivains = prepare ($bdd,'fetch', 'SELECT UPPER(nom) as nom, prenom FROM Ecrivains WHERE Ecrivains.id_ecrivains = :id',[':id' => $id_nom] );

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
    <link rel="stylesheet" href="css/account.css">

    <link rel="stylesheet" href="css/header.css">
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php'; ?> <!--importation du header-->
<div class="content">
<?php if (isset($id_nom)) { ?>
            <h1>Connecté</h1>
            <form action="" method="post">
                <input type="hidden" name="prenom" value="<?php echo $_POST['prenom'] ?>">
                <input type="hidden" name="nom" value="<?php echo $_POST['nom'] ?>">
                <input type="hidden" name="mdp" value="<?php echo $_POST['mdp'] ?>">


                <label for="nom">Votre nom</label>
                <input type="text" id="nom" name="new_nom" value="<?php echo $tab_ecrivains['nom']?>">

                <label for="pre">Votre prenom</label>
                <input type="text" name="new_prenom" id="pre" value="<?php echo ucfirst ($tab_ecrivains['prenom'])?>">

                <input type="submit" class="button" value="Enregistrer">
            </form>

            <form class="two" method="post" >
                <input type="hidden" name="prenom" value="<?php echo $_POST['prenom'] ?>">
                <input type="hidden" name="nom" value="<?php echo $_POST['nom'] ?>">
                <input type="hidden" name="mdp" value="<?php echo $_POST['mdp'] ?>">
                <input type="hidden" name="id_delete" value="true">

                <input class="button" type="submit" value="Supprimer l'accés a mon compte">
            </form>

            <p>Ne supprime pas les contenu crée.</p>

<?php } else {
?>
            <h1>Connectez-vous</h1>
            <form class="connetcion" method="post" action="">

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
