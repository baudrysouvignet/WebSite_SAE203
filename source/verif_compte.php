<?php
/// Requête SQL pour récupérer les écrivains
$requete_prepare = $bdd->prepare('SELECT * FROM Ecrivains WHERE Ecrivains.nom = :nom AND Ecrivains.prenom = :prenom;');
$requete_prepare->bindValue(':nom', strtolower($_POST['nom']), PDO::PARAM_STR);
$requete_prepare->bindValue(':prenom', strtolower($_POST['prenom']), PDO::PARAM_STR);
$requete_prepare->execute();
$res_ecrivains = $requete_prepare->fetchAll(PDO::FETCH_ASSOC);
$requete_prepare->closeCursor();

// Si on a trouvé des écrivains correspondant aux noms et prénoms fournis
if (!empty($res_ecrivains)) {
    foreach ($res_ecrivains as $ecrivain) {
        // On vérifie que le mot de passe fourni correspond bien à l'un des écrivains trouvés
        if (password_verify($_POST['mdp'], $ecrivain['mdp'])) {
            $id_nom = $ecrivain['id_ecrivains'];
            break;
        }
    }
}
?>