<?php
function testGame($i, $j, $grilles)
{
    if ($j < 3) { //verifie vers la droite
        if (($grilles[$i][$j] != -1) && ($grilles[$i][$j] == $grilles[$i][$j + 1]) && ($grilles[$i][$j] == $grilles[$i][$j + 2])) {
            return $grilles[$i][$j];
        }
    }
    if ($i < 3) { //verifie vers le bas
        if (($grilles[$i][$j] != -1) && ($grilles[$i][$j] == $grilles[$i + 1][$j]) && ($grilles[$i][$j] == $grilles[$i + 2][$j])) {
            return $grilles[$i][$j];
        }
    }
    if (($i > 1) && ($j < 3)) { //verifie en diagonale haut droit
        if (($grilles[$i][$j] != -1) && ($grilles[$i][$j] == $grilles[$i - 1][$j + 1]) && ($grilles[$i][$j] == $grilles[$i - 2][$j + 2])) {
            return $grilles[$i][$j];
        }
    }
    if (($i < 3) && ($j < 3)) { //verifie en giagonale bas droite
        if (($grilles[$i][$j] != -1) && ($grilles[$i][$j] == $grilles[$i + 1][$j + 1]) && ($grilles[$i][$j] == $grilles[$i + 2][$j + 2])) {
            return $grilles[$i][$j];
        }
    }
    return -1;
}


