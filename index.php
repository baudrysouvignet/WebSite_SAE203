<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

$requete = 'SELECT * FROM Articles ORDER BY rand() LIMIT 1;';
$res = $bdd -> query($requete);
$tab_article = $res -> fetch (PDO::FETCH_ASSOC);
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
    <meta name="author" content="Souvignet Baudry">

    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php';
?> <!--importation du header-->

<div class="content">
    <span class="tag button">Article ephemere</span>
    <article>
        <h1><?php echo $tab_article['titre'] ?></h1>
        <div class="more">
            <p><?php echo $tab_article['contenue'] ?></p>
            <a href="article.php?id=<?php echo $tab_article['id_article'] ?>" class="button">Lire l'article</a></div>
    </article>
    
    <div class="img" style="background-image: url('<?php echo $tab_article['img'] ?>')"></div>
    
</div>

</body>

<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
