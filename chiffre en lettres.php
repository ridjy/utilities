<?php
function int2str($a)
{
    $convert = explode('.',$a);
    if ($a<0) return 'moins '.int2str(-$a);
    if ($a<17)
    {
        switch ($a){
        //case 0: return 'zero';
        case 1: return 'UN';
        case 2: return 'DEUX';
        case 3: return 'TROIS';
        case 4: return 'QUATRE';
        case 5: return 'CINQ';
        case 6: return 'SIX';
        case 7: return 'SEPT';
        case 8: return 'HUIT';
        case 9: return 'NEUF';
        case 10: return 'DIX';
        case 11: return 'ONZE';
        case 12: return 'DOUZE';
        case 13: return 'TREIZE';
        case 14: return 'QUATORZE';
        case 15: return 'QUINZE';
        case 16: return 'SEIZE';
    }
    } else if ($a<20)
    {
        return 'DIX-'.int2str($a-10);
    } else if ($a<100){
        if ($a%10==0){
            switch ($a){
            case 20: return 'VINGT';
            case 30: return 'TRENTE';
            case 40: return 'QUARANTE';
            case 50: return 'CINQUANTE';
            case 60: return 'SOIXANTE';
            case 70: return 'SOIXANTE-DIX';
            case 80: return 'QUATRE-VINGT';
            case 90: return 'QUATRE-VINGT-DIX';
        }
    } elseif (substr($a, -1)==1)
    {
        if( ((int)($a/10)*10)<70 ){
            return int2str((int)($a/10)*10).'-ET-UN';
        } elseif ($a==71) {
            return 'SOIXANTE-ET-ONZE';
        } elseif ($a==81) {
            return 'QUATRE-VINGT-UN';
        } elseif ($a==91) {
            return 'QUATRE-VINGT-ONZE';
        }
    } elseif ($a<70){
        return int2str($a-$a%10).'-'.int2str($a%10);
    } elseif ($a<80){
        return int2str(60).'-'.int2str($a%20);
    } else{
        return int2str(80).'-'.int2str($a%20);
    }
    } else if ($a==100){
        return 'CENT';
    } else if ($a<200){
        return int2str(100).' '.int2str($a%100);
    } else if ($a<1000){
        return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
    } else if ($a==1000){
        return 'MILLE';
    } else if ($a<2000){
        return int2str(1000).' '.int2str($a%1000).' ';
    } else if ($a<1000000){
        return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
    }
    else if ($a==1000000){
        return 'MILLIONS';
    }
    else if ($a<2000000){
        return int2str(1000000).' '.int2str($a%1000000).' ';
    }
    else if ($a<1000000000){
        return int2str((int)($a/1000000)).' '.int2str(1000000).' '.int2str($a%1000000);
    }
}//fin function 
?>