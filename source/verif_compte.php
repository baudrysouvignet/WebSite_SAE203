
<?php
/// Requête SQL pour récupérer les écrivains

$res_ecrivains = prepare ($bdd, 'fetchAll', 'SELECT * FROM Ecrivains WHERE Ecrivains.nom = :nom AND Ecrivains.prenom = :prenom;', [':nom'=>strtolower($_POST['nom']),':prenom' => strtolower($_POST['prenom']) ], 'PDO::PARAM_STR');

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