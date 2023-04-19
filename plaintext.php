<?php

function encode($plainText) {
  $result = '';
  $CharActuel = '';
  $CharActuelCount = 0;
  
  for ($i = 0; $i < strlen($plainText); $i++) {
    $char = $plainText[$i];
    
    if ($char === $CharActuel) {
      $CharActuelCount++;
    } else {
      if ($CharActuelCount > 0) {
        $result .= $CharActuelCount . $CharActuel;
      }
      
      $CharActuel = $char;
      $CharActuelCount = 1;
    }
  }
  
  if ($CharActuelCount > 0) {
    $result .= $CharActuelCount . $CharActuel;
  }
  
  return $result;
}

?>