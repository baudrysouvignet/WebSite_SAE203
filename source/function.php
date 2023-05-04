<?php


// La fonction compare() compare deux données ($data1 et $data2) et renvoie $respos si elles sont égales et $resneg sinon.
function compare( $data1, $data2, $respos, $resneg){
    if ($data1 == $data2){
        return $respos;
    } else {
        return $resneg;
    }
}

// La fonction prepare_fct cpermet de récuperer des données de la database $bdd en selctionnat le $fecth et en donnant les variable dans $tab
function prepare_fct($bdd, $fetch, $sql, $tab){
    $requete_prepare = $bdd->prepare ( $sql);

    foreach ($tab as $key => $val){
        $requete_prepare->bindValue ($key , $val );
    }

    $requete_prepare->execute ();
    $tab_ecrivains = $requete_prepare->$fetch( PDO::FETCH_ASSOC );
    $requete_prepare -> closeCursor ();

    return $tab_ecrivains;
}