<?php
include 'source/php_request_header.php'; /*requete pour le header et importation du $bdd*/
include 'source/function.php';

if (!isset($_GET['id'])) { /*rediriger vers une page qui existe*/
    header('Location: pages.php?id='.$tab[0]["id_tag"]);
    exit();
}

#gerer le systeme de tri des data
$filtres = [1=>'Les plus vues', 2=> 'Nouveauté', 3=>'Notre selection'];

$trie = 1;
if (isset($_GET['trie'])){
    $trie = $_GET['trie'];
}

/*Requetes sql pour requperer le nom de la page via le tag*/
$requete_prepare = $bdd->prepare('SELECT nom FROM Tag WHERE id_tag=:tag_id');
$requete_prepare->bindValue(':tag_id', $_GET['id'], PDO::PARAM_INT);
$requete_prepare->execute();
$res_nom = $requete_prepare->fetch(PDO::FETCH_ASSOC);


/*Requetes sql pour requperer tout les articles avec le tag attendu et le nombre de vue*/
$requete_prepare = $bdd->prepare('SELECT DISTINCT COUNT(DISTINCT vues.ip), Articles.id_article, Articles.titre,  Articles.contenue, Articles.img, UPPER(Ecrivains.nom) AS nom, Ecrivains.prenom, Articles.date FROM vues,Articles, Ecrivains, Tag, Vconnect
WHERE Articles.article_id_ecrivain = Ecrivains.id_ecrivains AND Articles.id_article = Vconnect.id_article AND Vconnect.id_tag = Tag.id_tag AND Tag.id_tag = :tag_article_id AND Articles.id_article = vues.vue_id_article GROUP BY Articles.id_article');
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
    <?php var_dump ($tab_acrticles)?>

    <div class="head">
        <h1 class="big_text"><span class="color">#</span><?php echo $res_nom['nom'] ?></h1>
        <a href="rediger.php" class="button">Ecrire un article</a>
    </div>

    <div class="nav">

        <?php
        foreach ($filtres as $key => $val){
            $href = compare($key, $trie, '', "href='pages.php?id=".$_GET["id"]."&trie=".$key."'"); /*permet de comparer les valeur et de retourner les valeurs voulu grace a la fonction*/
            $class = compare ($key, $trie, 'actif', 'inactif');

            echo <<<HTML
<a $href class="$class">$val</a>
HTML;
        }

        ?>
    </div>

    <section>
        <?php

        foreach ($tab_acrticles as $article){
            $prenom = ucfirst($article["prenom"]);
            $date_fr = date('d/m/Y', strtotime($article["date"]));
            echo <<<HTML
<article>
    <img src="{$article["img"]}">
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
