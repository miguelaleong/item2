<?php

function generate(array $list)
{
    if (count($list) > 2) {
        for ($i = 0; $i < count($list); $i ++) {
            $listCopy = $list;          
            $entry = array_splice($listCopy, $i, 1);
            foreach (generate($listCopy) as $combination) {
                yield array_merge($entry, $combination);
            }
        }
    } elseif (count($list) > 0) {
        yield $list;
        if (count($list) > 1) {
            yield array_reverse($list);
        }
    }
}

function solution($cadena1, $cadena2)
{
    $cadena1 = strtoupper($cadena1);
    $cadena2 = strtoupper($cadena2);
    $arreglo2 = str_split($cadena2);
    $combinations = array();
    $numCombinacion = 0;
    $numApariones = 0;
    foreach (generate($arreglo2) as $combination) {
        $numApariones += substr_count($cadena1, implode($combination));
    }
    echo $numApariones;
}

solution("Hola que buena Ola Laomir", "OLA");
?>