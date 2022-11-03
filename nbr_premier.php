<?php
/**nombre premier = nombre divisible qur par 1 et lui même */
function is_prime(int $n): bool
{
  // TODO
  //if n is negative
  if ($n<=0)
  {
  	return false;
  }//endif
 
  $c = 0;
  for ($i=$n; $i>0; $i--)
  {
	  if ( ($n % $i) == 0 )
  	    $c++;
  }//endfor
  return ($c>2) ? false : true;
   
}//end fct

var_dump(is_prime(10));
