<?php
require 'config/connection.php';

#récuperer les 3 premiers tags les plus utilisé.
$requete="SELECT tag.id_tag, tag.icon, tag.nom, COUNT(*) as 'count' FROM tag, vconnect WHERE tag.id_tag = vconnect.id_tag AND tag.icon != 'circle-info' GROUP BY tag.id_tag ORDER BY count DESC LIMIT 3;";
$resultats=$bdd->query($requete);
$tab=$resultats->fetchAll(PDO::FETCH_ASSOC);
$resultats->closeCursor();
?>