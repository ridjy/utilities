<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $N);
$list = [];
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%s", $t);
    $temp = stockerSousChaines($t);
    foreach ($temp as $v)
    {
        //if($i==1)
        //{ error_log(var_export($v, true));error_log(var_export($list, true));die(); }
        if (!in_array($v,$list,true))
        {
            $list[]=$v;
        }
    }//end foreach
}

function stockerSousChaines($chaine) {
    $longueur = strlen($chaine);
    $tableau = [];
    $sousChaine = '';

    for ($i = 0; $i < $longueur; $i++) {
        $sousChaine .= $chaine[$i];
        $tableau[] = $sousChaine;
    }

    return $tableau;
}
// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
//error_log(var_export($list, true));die;
echo count($list);
?>