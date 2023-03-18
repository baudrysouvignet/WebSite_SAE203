<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="https://use.typekit.net/kmv3lzq.css">

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rediger.css">

    <link rel="stylesheet" href="css/header.css">
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php'; ?> <!--importation du header-->

<div class="content">
    <form method="post" action="">
        <textarea name="title" minlength="60" maxlength="100" class="big_text titleinput" rows="2" placeholder="Titre"></textarea>
        <textarea name="article" class="article" placeholder="Mon article..."></textarea>

        <div class="popup" id="popup">
            <label for="nom">Nom</label>
            <input type="text" placeholder="Souvignet" name="nom" id="nom">

            <label for="prenom">Prenom</label>
            <input type="prenom" placeholder="Baudry" name="prenom" id="prenom">

            <input type="submit" class="button" value="Envoyer mon article">
        </div>
    </form>
    <span class="button" id="affiche">Publier mon article</span>
</div>
<div class="filtre"></div>

</body>

<script src="js/rediger.js"></script>
<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
