<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

$requet = 'SELECT id_tag, nom FROM Tag ORDER BY nom';
$res = $bdd -> query ($requet);
$tab_tag = $res -> fetchAll (PDO::FETCH_ASSOC);
$res->closeCursor ();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="https://use.typekit.net/kmv3lzq.css">

    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/rediger.css">
    <link rel="stylesheet" href="css/cssavance.css">

    <link rel="shortcut icon" href="img/WLogo.ico" />

    <link rel="stylesheet" href="css/header.css">
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php'; ?> <!--importation du header-->
<h1 style="display: none;">Erivez votre article</h1>
<div class="content">
    <form method="post" action="source/send.php">
        <label style="display: none" for="title_request">Titre</label>
        <textarea name="title" id="title_request" minlength="60" maxlength="100" class="big_text titleinput" rows="3" placeholder="Titre" required></textarea>

        <label style="display: none" for="article_request">Titre</label>
        <textarea name="article" id="article_request" class="article" placeholder="Si vous souhaitez creer des paragraphe, ajouter <br><br> à la fin de votre phrase" required></textarea>

        <div class="tag">
            <?php
            // Boucle pour créer deux éléments de sélection avec des noms de balises dynamiques (tag_1 et tag_2)
            for ($i=1 ; $i<3; $i++){
                // Création de chaînes de caractères multilignes en HTML
                echo <<<HTML
            <div class="tag_$i">
                <label id="label_select_$i" for="select_$i">Tag 0$i</label>
                <select id="select_$i" name="select_$i" onchange="showInput($i)" >
        HTML;

                // Boucle pour créer les options à partir d'un tableau de données (tab_tag)
                foreach ($tab_tag as $tag){
                    // Condition pour déterminer quelle option doit être sélectionnée par défaut
                    $select = $tag['id_tag'] == $tab_tag[$i-1]['id_tag'] ? 'selected' : "";
                    // Créer des chaînes de caractères multilignes pour chaque option
                    echo <<<HTML
                <option value="{$tag['id_tag']}" $select>{$tag['nom']}</option>
            HTML;
                }

                // Créer un conteneur d'entrée supplémentaire qui sera affiché lorsque l'option "autre" est sélectionnée
                echo <<<HTML
                    <option value="autre">Autre</option>
                </select>
                <div id="input-container_$i" style="display:none;">
                    <label for="autre-tag_$i">Tag 0$i</label>
                    <input type="text" id="autre-tag_$i" name="autre-tag_$i" placeholder="Votre tag">
                </div>
            </div>
        HTML;
            }
            ?>
            <div class="tag_X">
                <label for="file-upload">Image :</label>
                <input type="text" id="file-upload" name="file-upload" placeholder="URL Unsplash (https://images.unsplash.com/)" required>
            </div>
        </div>

        <div class="popup unactive" id="popup">
            <p>La publiaction d'un article est une action definitive</p>
            <label for="nom">Nom</label>
            <input type="text" placeholder="Souvignet" name="nom" id="nom" required>

            <label for="prenom">Prenom</label>
            <input type="text" placeholder="Baudry" name="prenom" id="prenom" required>

            <label for="mdp">Mot de passe</label>
            <input maxlength="30" minlength="10" type="password" placeholder="Votre mot de passe" name="mdp" id="mdp" required>

            <input type="submit" class="button" value="Envoyer mon article">
        </div>
    </form>
    <span class="button" id="affiche">Publier mon article</span>
</div>
<div class="filtre unactive"></div>

</body>

<script src="js/rediger.js"></script>
<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
