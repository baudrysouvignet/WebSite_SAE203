<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php'; // Importation de fonctions

// Redirection si aucun ID n'est spécifié dans l'URL
if (!isset($_GET['id'])) {
    header('Location: pages.php?id='.$tab[0]["id_tag"]);
    exit();
}

// Gestion du système de tri des données
$filtres = [1=>'Les plus vues', 2=> 'Nouveauté', 3=>'Notre selection'];
$groupeby = 'ORDER BY Vues';
$trie = 1;
if (isset($_GET['trie'])){
    $trie = $_GET['trie'];

    // Selon la valeur de $_GET['trie'], on modifie la clause ORDER BY de la requête SQL
    switch ($trie){
        case (1):
            $groupeby = 'ORDER BY Vues DESC'; break;
        case (2):
            $groupeby = 'ORDER BY date DESC'; break;
        case (3):
            $groupeby = 'ORDER BY RAND ()'; break;
    }
}

// Requête SQL pour récupérer le nom de la page associé au tag
$requete_prepare = $bdd->prepare('SELECT nom FROM Tag WHERE id_tag=:tag_id');
$requete_prepare->bindValue(':tag_id', $_GET['id'], PDO::PARAM_INT);
$requete_prepare->execute();
$res_nom = $requete_prepare->fetch(PDO::FETCH_ASSOC);

// Requête SQL pour récupérer les articles associés au tag, avec le nombre de vues
$requete_prepare = $bdd->prepare('SELECT DISTINCT COUNT(DISTINCT vues.ip) as vues, Articles.id_article, Articles.titre, Articles.contenue, Articles.img, UPPER(Ecrivains.nom) AS nom, Ecrivains.prenom, Articles.date 
FROM Articles
LEFT JOIN vues ON Articles.id_article = vues.vue_id_article
JOIN Ecrivains ON Articles.article_id_ecrivain = Ecrivains.id_ecrivains 
JOIN Vconnect ON Articles.id_article = Vconnect.id_article 
JOIN Tag ON Vconnect.id_tag = Tag.id_tag AND Tag.id_tag = :tag_article_id
GROUP BY Articles.id_article '. $groupeby);
$requete_prepare->bindValue(':tag_article_id', $_GET['id'], PDO::PARAM_INT);
$requete_prepare->execute();
$tab_acrticles = $requete_prepare->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>News</title>
    <link rel="stylesheet" href="https://use.typekit.net/kmv3lzq.css">

    <link rel="stylesheet" href="css/global.css">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/pages.css">
</head>
<body>
<?php include 'source/header.php'; ?> <!--importation du header-->

<div class="content">
    <div class="head">
        <h1 class="big_text"><span class="color">#</span><?php echo $res_nom['nom'] ?></h1>
        <a href="rediger.php" class="button">Ecrire un article</a>
    </div>

    <div class="nav">

        <?php
        // Boucle pour générer les liens HTML
        foreach ($filtres as $key => $val){
            // Détermination de l'attribut href et class
            $href = compare($key, $trie, '', "href='pages.php?id=".$_GET["id"]."&trie=".$key."'"); /*permet de comparer les valeur et de retourner les valeurs voulu grace a la fonction*/
            $class = compare ($key, $trie, 'actif', 'inactif');

            // Affichage du lien HTML
            echo <<<HTML
<a $href class="$class">$val</a>
HTML;
        }

        ?>
    </div>

    <section>
        <?php
        // boucle qui itère sur chaque article à afficher
        foreach ($tab_acrticles as $article){
            // formatage du prénom de l'auteur avec une majuscule en début de chaîne
            $prenom = ucfirst($article["prenom"]);
            // formatage de la date au format jj/mm/aaaa
            $date_fr = date('d/m/Y', strtotime($article["date"]));

            // affichage de chaque article avec les informations correspondantes
            echo <<<HTML
<article>
    <img src="{$article["img"]}" alt="l'image decris {$article["titre"]}">
    <div class="info">
        <span>Redigé par {$article["nom"]} $prenom - $date_fr</span>
        <h2>{$article["titre"]}</h2>
        <p>{$article["contenue"]}</p>
    </div>
</article>
HTML;

        }

        ?>
    </section>
</div>


</body>

<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
