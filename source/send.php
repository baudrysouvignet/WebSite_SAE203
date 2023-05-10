<?php
require '../config/connection.php';
require 'function.php';

// si $_POST n'existe pas on redirige vers index.php
if ( ! isset( $_POST[ 'title' ] ) ) {
    header ( 'Location: ../index.php' );
    exit();
}

/*1- Le compte*/
// verifier si le compte existe
include 'verif_compte.php';

//si le compte nexiste pas
if (!isset($id_nom)) {
    // encripte le mdp
    $mdp_hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    //envoie les donnée a la bdd $bdd
    $insert_query = "INSERT INTO ecrivains (nom, prenom, mdp) VALUES (:nom, :prenom, :mdp)";
    $requete_prepare = $bdd->prepare($insert_query);
    $requete_prepare->execute([
        ':nom' => strtolower($_POST['nom']),
        ':prenom' => strtolower($_POST['prenom']),
        ':mdp' => $mdp_hash
    ]);

    //on récupere l'id du compte créer
    $id_nom = $bdd->lastInsertId();
}


/*2- L'article*/
// on écrit l'article dans la base
$insert_query = "INSERT INTO articles (titre, date, contenue, img, temps_de_lecture, article_id_ecrivain) VALUES (:titre, :date, :contenue, :img, :temps_de_lecture, :article_id_ecrivain)";
$requete_prepare = $bdd->prepare($insert_query);
$requete_prepare->execute([
    ':titre' => $_POST['title'],
    ':date' => date('Y-m-d'),
    ':contenue' => $_POST['article'],
    ':img' => $_POST['file-upload'],
    ':temps_de_lecture' => ceil(strlen($_POST['article'])/1200),
    'article_id_ecrivain' => $id_nom
]);
//on récupere l'id de l'article créer
$id_nom = $bdd->lastInsertId();


/*3 - Les tags*/

// Une boucle for est utilisée pour traiter chaque tag. Ici, il y a deux tags (les tags 1 et 2), donc la boucle va itérer deux fois.
for ($i = 1; $i<3; $i++){
    $nom = 'tag_'.$i;
    $select = 'select_'.$i;

    //savoir si le user a clicker sur autre et a entrer un nv tag
    $autre = $_POST['autre-tag_'.$i];

    //si un nouveau tag est créer alors on evoie dans la bdd
    if (strlen($_POST['autre-tag_'.$i]) != 0){

        $insert_query = "INSERT INTO tag (nom, icon) VALUES (:nom, :icon)";
        $requete_prepare = $bdd->prepare($insert_query);
        $requete_prepare->execute([
            ':nom' => $autre,
            ':icon' => 'circle-info',
        ]);

        // récupére l'id du tag sur la variable 'tag_1' ou 'tag_2' selon le nombre d'itération
        $$nom = $bdd->lastInsertId();

    } else {
        // si il existe, on récupére juste la value du option
        $$nom = $_POST[$select];
    }
}

/*4 - Vconnect*/
// Une boucle for est utilisée pour traiter chaque tag. Ici, il y a deux tags (les tags 1 et 2), donc la boucle va itérer deux fois.
// créer la liaison entre l'article et les tags
for ($i = 1; $i<3; $i++){
    $nom = 'tag_'.$i;
    $insert_query = "INSERT INTO vconnect (id_tag, id_article) VALUES (:tag, :article)";
    $requete_prepare = $bdd->prepare($insert_query);
    $requete_prepare->execute([
        ':tag' => $$nom,
        ':article' => $id_nom,
    ]);
}

// on fini par rediriger le user sur l'index
header ( 'Location: ../index.php' );
exit();