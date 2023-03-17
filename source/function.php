<?php


// La fonction compare() compare deux données ($data1 et $data2) et renvoie $respos si elles sont égales et $resneg sinon.
function compare( $data1, $data2, $respos, $resneg){
    if ($data1 == $data2){
        return $respos;
    } else {
        return $resneg;
    }
}