<?php

/*permet d'entrer des données et de les comparer rapidement*/
function compare($data1, $data2, $respos, $resneg){
    if ($data1 == $data2){
        return $respos;
    } else {
        return $resneg;
    }
}