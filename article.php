<?php
// Inclusion des fichiers nécessaires
include 'source/php_request_header.php'; // Requête pour le header et importation de $bdd
include 'source/function.php';

if ( ! isset( $_GET[ 'id' ] ) ) {
    // Redirection vers la page d'accueil si l'identifiant de l'article n'est pas fourni dans la requête
    header ( 'Location: index.php');
    exit();
}

// Requête SQL pour récupérer toutes les info de l'article
$requete_prepare = $bdd->prepare ( 'SELECT titre, contenue, img FROM Articles WHERE Articles.id_article = :article' );
$requete_prepare->bindValue ( ':article' , $_GET[ 'id' ] , PDO::PARAM_INT );
$requete_prepare->execute ();
$tab_article = $requete_prepare->fetch( PDO::FETCH_ASSOC );
$requete_prepare -> closeCursor ();

if (empty($tab_article)){
    // Redirection vers la page d'accueil si l'article n'existe pas
    header ( 'Location: index.php');
    exit();
}



// Requête SQL pour récupérer la date de la derniere vue pour l'ip
$requete_prepare = $bdd->prepare ( 'SELECT * FROM vues WHERE ip=:ip AND vue_id_article = :article ORDER BY date DESC' );
$requete_prepare->bindValue ( ':ip' , $_SERVER['REMOTE_ADDR'] , PDO::PARAM_INT );
$requete_prepare->bindValue ( ':article' , $_GET[ 'id' ] , PDO::PARAM_INT );
$requete_prepare->execute ();
$tab_vues = $requete_prepare->fetch( PDO::FETCH_ASSOC );
$requete_prepare -> closeCursor ();

// Si aucune vue n'a été enregistrée pour cette adresse IP ou si la dernière vue enregistrée remonte à plus de 5 minutes,
if (empty($tab_vues) || ((int) DateTime::createFromFormat('d/m/y H:i', $tab_vues['date'])->diff(DateTime::createFromFormat('d/m/y H:i', date('d/m/y H:i')))->i > 5)) {

    // une nouvelle vue est insérée dans la base de données
    $insert_query = "INSERT INTO vues (ip, date, vue_id_article) VALUES (:ip, :date, :id_article)";
    $requete_prepare = $bdd->prepare($insert_query);
    $requete_prepare->execute([
        ':ip' => $_SERVER['REMOTE_ADDR'],
        ':date' => date('d/m/y H:i'),
        ':id_article' => $_GET['id']
    ]);
}

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
    <link rel="stylesheet" href="css/article.css">
</head>

<body>
<?php // Importation de fonctions
include 'source/header.php'; ?> <!--importation du header-->

<div class="content">
    <h1><?php echo $tab_article['titre'] ?></h1>
    <div class="img" style="background-image:URL(<?php echo $tab_article['img'] ?>)"></div>
    <article><p><?php echo $tab_article['contenue'] ?></p></article>
</div>


</body>

<script src="https://kit.fontawesome.com/db392bfedc.js" crossorigin="anonymous"></script>
</html>
