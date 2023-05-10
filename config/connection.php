<?php
    // modifiez les paramètres pour accéder à la BDD client
    $hote='sae203baudrysou.mmi-lepuy.fr';
    $port='22';
    $nom_bd='basouvigne_admin203';
    $identifiant='basouvigne_admin203';
    $mot_de_passe='basouvadmin203';
    $encodage='utf8';
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.$encodage);

    //Connection en PDO a la BDD new203 (réglage Mac mdp: root)
    $bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bd,$identifiant, $mot_de_passe,$options);
?>