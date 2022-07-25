<?php
class Change
   {
       public $c2;
       public $c5;
       public $c10;
   }
   
   function operateChange($nb)
   {
      $ret = new Change();
      $ret->c2 = 0;
      $ret->c5 = 0;
      $ret->c10 = 0;
      $reste = $nb;
      if($reste>=10)
         $ret->c10 = nombreBillet(10, $reste);
      $reste -= ($ret->c10*10);
      if($reste>=5)
         $ret->c5 = nombreBillet(5, $reste);
      $reste -= ($ret->c5*5);
      if($reste>=2)
         $ret->c2 = nombreBillet(2, $reste);
      $reste -= ($ret->c2*2);
      if($reste>0)
         return "impossible";
      else
         return $ret;
   }

   function nombreBillet($billet, $montant){
      $reste = $montant;
      $nombre = 0;
      while($reste >= $billet){
         $reste -= $billet;
         $nombre ++;
      }
      return $nombre;
   }
   
   $nb = 7;
   $o = operateChange($nb);
   if($o=="impossible"){
      echo $o;
   }
   else{
      echo "nb de 2$ = ". $o->c2 . "\n";
      echo "nb de 5$ = ". $o->c5 . "\n";
      echo "nb de 10$ = ". $o->c10 . "\n";
      
      $v = ($o->c2*2) +  ($o->c5*5) + ($o->c10*10);
      echo "la valeur du change est de $v";
   }