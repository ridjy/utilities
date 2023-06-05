<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%s", $line1);
fscanf(STDIN, "%s", $line2);
fscanf(STDIN, "%s", $line3);
fscanf(STDIN, "%s", $line4);
$l[]=str_split($line1);$l[]=str_split($line2);$l[]=str_split($line3);$l[]=str_split($line4);
//la matrice l
//$nbr0 = countZeros($l);
//error_log(var_export($nbr0, true));
$atemp = [];
$res = resoudre4x4($l,$atemp);
//error_log(var_export($res, true));die;
foreach ($res as $v)
{
    echo implode("",$v)."\n";
}  

/*---------------les fonctions------*/
function resoudre4x4($l,$atemp)
{
    $nbr0 = countZeros($l);$c=0;
    While ($nbr0 != 0)
    {
        $blong = false; $blarge = false; 
        $at = [];//init/reinit
        /*if($c!=0)
        {    error_log(var_export($nbr0, true));die(); }*/
        //parcous en longueur
        for ($i=0; $i < 4; $i++)
        {
            $line = implode("",$l[$i]);
            if (substr_count($line, '0')==1)
            {
                $blong = true;
                $a=str_split($line);
                $nmanquant = checkNumbers($a);
                $line = str_replace('0',$nmanquant,$line);
                $l[$i]=str_split($line);//on remet la ligne
            }
        }

        //parcous en largueur
        for ($j=0; $j < 4; $j++)
        {
            $line = $l[0][$j].$l[1][$j].$l[2][$j].$l[3][$j];
            if (substr_count($line, '0')==1)
            {
                $blarge = true; 
                $a=str_split($line);
                $nmanquant = checkNumbers($a);
                $line = str_replace('0',$nmanquant,$line);
                $temp=str_split($line);//on remet la ligne
                $l[0][$j]=$temp[0];$l[1][$j]=$temp[1];$l[2][$j]=$temp[2];$l[3][$j]=$temp[3];
            }
        }

        //il y a 2 zero dans la ligne 
        if (!$blong && !$blarge)
        {
            //reperer le 1er 0 
            //parcous en longueur
            for ($i=0; $i < 4; $i++)
            {
                for ($j=0; $j < 4; $j++)
                {
                    if ($l[$i][$j]=='0')
                    {
                        $ii = $i; $ij = $j;
                        break(2);//on arrête
                    }
                }//fin $j
            }//fin $i

            /*error_log(var_export($l, true));
            error_log(var_export($ii, true));
            error_log(var_export($ij, true));die();*/

            //on a $ii et $ij 
            for ($i=0; $i < 4; $i++)
            {
                if ($l[$i][$ij]!='0')
                {
                    $at[] = $l[$i][$ij];
                }
            }//fin $i
            for ($j=0; $j < 4; $j++)
            {
                if ($l[$ii][$j]!='0')
                {
                    $at[] = $l[$ii][$j];
                }
            }//fin $i
            $valunique = array_unique($at);
            //error_log(var_export($valunique, true));die();
            //@todo if faut trouver 3 valeurs unique pour que ça marche
            if (count($valunique) < 3 )
            {
                $nchoisi = checkNumbers($valunique);
                $l[$ii][$ij]="$nchoisi";
                $valunique[] = $nchoisi;
                $nautre = checkNumbers($valunique);
                //on ne fait q'une fois, si ne marche pas oon revient au dernier etat s^r
                //if (empty($atemp))
                //{   
                    $atemp = $l;//on sauve l'etat OK
                    $atemp[$ii][$ij]="$nautre";//parsestring
                //}
                //error_log(var_export($l, true));die();
            } else {
                //on est sur de la réponse
                $nmanquant = checkNumbers($valunique);
                $l[$ii][$ij]=$nmanquant;
            }
            
        }//fin il y a 2 zero ou plus

        //error_log(var_export($l, true));
        $nbr0 = countZeros($l) ;//on recompte
        //error_log(var_export($nbr0, true));
        $c++;
    }//fin while

    if (isresolved($l)) 
    {    return $l; //c resolu
    } else {
        $l = $atemp; $atemp = [];
        //error_log(var_export($l, true));die;
        return resoudre4x4($l,$atemp);
    }    

}//end resoudre4x4

//compter les 0
function countZeros($array) {
    $count = 0;

    foreach ($array as $row) {
        foreach ($row as $value) {
            if ($value == '0') {
                $count++;
            }
        }
    }

    return $count;
}

function checkNumbers($array) {
    $validNumbers = array(4, 3, 2, 1);
    
    foreach ($validNumbers as $number) {
        if (!in_array($number, $array)) {
            return $number;
        }
    }
    
    return 0; // Si tous les chiffres sont présents dans le tableau
}

//array à 2 dimensions
function isresolved($array)
{
    $b_res = true; 
    foreach ($array as $value)
    {
        
        $uniqueCharacters = array_unique($value);
        if ( count($value) != count($uniqueCharacters) )
        {
            return false;
        }
    }
    return $b_res;
}

?>