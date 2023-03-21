<?php
require '../config/connection.php';
require 'function.php';

if ( ! isset( $_POST[ 'title' ] ) ) {
    header ( 'Location: ../index.php' );
    exit();
}

/*1- Le compte*/



// Si aucun écrivain correspondant aux noms et prénoms fournis n'a été trouvé, on insère un nouvel écrivain dans la base de données
include 'verif_compte.php';

if (!isset($id_nom)) {
    $mdp_hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO Ecrivains (nom, prenom, mdp) VALUES (:nom, :prenom, :mdp)";
    $requete_prepare = $bdd->prepare($insert_query);
    $requete_prepare->execute([
        ':nom' => strtolower($_POST['nom']),
        ':prenom' => strtolower($_POST['prenom']),
        ':mdp' => $mdp_hash
    ]);
    $id_nom = $bdd->lastInsertId();
}


/*2- L'article*/

$insert_query = "INSERT INTO Articles (titre, date, contenue, img, temps_de_lecture, article_id_ecrivain) VALUES (:titre, :date, :contenue, :img, :temps_de_lecture, :article_id_ecrivain)";
$requete_prepare = $bdd->prepare($insert_query);
$requete_prepare->execute([
    ':titre' => $_POST['title'],
    ':date' => date('Y-m-d'),
    ':contenue' => $_POST['article'],
    ':img' => $_POST['file-upload'],
    ':temps_de_lecture' => ceil(strlen($_POST['article'])/1200),
    'article_id_ecrivain' => $id_nom
]);
$id_nom = $bdd->lastInsertId();

/*3 - Les tags*/

// Une boucle for est utilisée pour traiter chaque tag. Ici, il y a deux tags (les tags 1 et 2), donc la boucle va itérer deux fois.
for ($i = 1; $i<3; $i++){
    $nom = 'tag_'.$i;
    $select = 'select_'.$i;
    $autre = $_POST['autre-tag_'.$i];
    if (strlen($_POST['autre-tag_'.$i]) != 0){

        $insert_query = "INSERT INTO Tag (nom, icon) VALUES (:nom, :icon)";
        $requete_prepare = $bdd->prepare($insert_query);
        $requete_prepare->execute([
            ':nom' => $autre,
            ':icon' => 'circle-info',
        ]);

        $$nom = $bdd->lastInsertId();

    } else {
        $$nom = $_POST[$select];
    }
}

/*4 - Les tags*/
// Une boucle for est utilisée pour traiter chaque tag. Ici, il y a deux tags (les tags 1 et 2), donc la boucle va itérer deux fois.
for ($i = 1; $i<3; $i++){
    $nom = 'tag_'.$i;
    $insert_query = "INSERT INTO Vconnect (id_tag, id_article) VALUES (:tag, :article)";
    $requete_prepare = $bdd->prepare($insert_query);
    $requete_prepare->execute([
        ':tag' => $$nom,
        ':article' => $id_nom,
    ]);
}


header ( 'Location: ../index.php' );
exit();