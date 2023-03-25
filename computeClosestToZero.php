//Implémentez la fonction computeClosestToZero(array $ts) qui prend un tableau de températures $ts en paramètre et renvoie la température la plus proche de zéro.

<?php

function computeClosestToZero(array $ts) 
{
  if (count($ts) === 0) {
    return 0; // Retourne 0 si le tableau est vide
  }

  $closest = $ts[0]; // On commence en supposant que le premier élément est le plus proche de zéro

  foreach ($ts as $temp) {
    // Si la valeur absolue de la température en cours est plus petite que celle de la température la plus proche de zéro trouvée jusqu'à présent ou si les deux températures ont la même distance absolue de zéro mais que la température en cours est positive, on remplace la température la plus proche par la température en cours
    if (abs($temp) < abs($closest) || (abs($temp) == abs($closest) && $temp > 0)) {
        $closest = $temp;
      }
  }

  return $closest;
}

?>