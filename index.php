<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

$requete = 'SELECT * FROM Articles ORDER BY date LIMIT 5;';
$res = $bdd -> query($requete);
$tab_article = $res -> fetchAll(PDO::FETCH_ASSOC);
$res -> closeCursor ();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="https://use.typekit.net/kmv3lzq.css">
    <meta name="description" content="Découvrez nos articles, apprenez-en plus sur les détails, les avantages et les astuces pour mieux comprendre le mode.">
    <meta name="keywords" content="Article, Lecture, Sujet, Détails, Avantages, Astuces, Compréhension">

    <link rel="shortcut icon" href="img/WLogo.ico" />

    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="js/carrousel.js" defer></script>
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php';
?> <!--importation du header-->

<div class="navCar" style="display: flex; justify-content: center">
    <button class="carBtn" id="left">Left</button>
    <button class="carBtn" id="right">Right</button>
    <button class="pause" id="playpause">Mettre</button>
</div>

<div class="content" id="carContent">
    <div class="car" id="car">

    <?php

    foreach ($tab_article as $article){
        echo <<<HTML
            <section>
                    <article>
                        <h1>{$article["titre"]}</h1>
                        <div class="more">
                            <p>{$article['contenue']}</p>
                            <a href="article.php?id="{$article['id_article']}" class="button">Lire l'article</a></div>
                    </article>
            
                    <div class="img" style="background-image: url('{$article['img']}')"></div>
                </section>
HTML;

    }

    ?>
    </div>
</div>

</body>

<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>

</html>
