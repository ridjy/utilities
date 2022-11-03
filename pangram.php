<?php

/*phrase contenant toutes les lettres de l'alphabet
et occurence = 1*/
function detect_pangram($string)
{
  #your code here
  $a_texte = str_split($string);
  $c = 0;
  $a_alphabet = range('a','z');//array indicé de a à z ; dernier indice 25
  foreach ($a_texte as $char)
  {//pour chaque lettre
	//on test seulement les lettre de l'alphabet
	if (in_array(strtolower($char),$a_alphabet))
	{
    	foreach ($a_alphabet as $alphabet)
    	{
        	if ( strtoupper($char)==strtoupper($alphabet) )
        	{
            	$c++;
            	continue;//passe à la lettre suivante du texte
        	}
     	 
    	}//end foreach alphabet
   	 
    	if ($c ==0 ) { return false; } else { $c=0; }  
	}
 	 
  }//end foreach lettre
 
  return true;
}//end fct

$result4 = detect_pangram("The quick brown fox jumps over the lazy dog.");
//$result5 = detect_pangram("Abcdefghijklmnopqrstuvwxyz");
var_dump($result4);
