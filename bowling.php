<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    $a_res = [];
    $GAME = stream_get_line(STDIN, 64 + 1, "\n");
    $a_res = calculScore($GAME);
    $res = implode(" ",$a_res);
    echo $res."\n"; 
}

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)

//echo("5 13 18 26 31 32 34 40 47 54\n");
function calculScore($jeu)
{
    $a_score[0] = 0;
    $bonus = 0;
    $a_jeu = explode(" ",$jeu);//array de 0 à 9
    $i=1;
    $lastval0 = 0;//val à $i-2
    $lastval = 0;
    foreach ($a_jeu as $frame)
    {
        $a_score[$i] = 0;

        $manche = str_split($frame);//array de 1,2 voire 3 si 10e frame
        foreach ($manche as $val)
        {
            if ($val=='X')
            {
                //strike
                $a_score[$i] = 10;
                if($bonus>0 && $lastval=='/')
                {
                    //strike après spare
                    $a_score[$i-1] += 10;
                    $bonus--;   
                }
                //si il reste un bonus cad 2 strike 
                if($bonus>0 && $lastval=='X')
                {
                    $a_score[$i-2] += 10;
                    $a_score[$i-1] += 10;
                } 

                if ($i!=10)
                {
                    $bonus = 2;
                } else {
                    //on est à la fin
                    if($lastval=='X')
                        $a_score[$i] += 10;
                    if($lastval0=='X' && count($manche)==3 && $manche[2]==$val)
                    $a_score[$i] += 20;
                    //error_log(var_export($a_score, true));die();
                }   

            } else if($val=='/')
            {
                //spare
                $a_score[$i] = 10;
                if($bonus>0)
                {
                    //spare après strike
                    $a_score[$i-1] = $a_score[$i-1]+10-$lastval;
                    $bonus--;
                    //l'indice 0 ne compte pas
                    if ($i==2)
                    {
                        $a_score[$i-1] -= $a_score[$i-2];
                    }
                }
                

                if ($i!=10)
                {
                    $bonus = 1;
                } else
                {
                    //dernier spare avec strike
                    if (count($manche)==3 && $manche[2]==$val)
                    {   $a_score[$i] = $a_score[$i]+10;
                    }
                    //error_log(var_export($a_score[$i], true));die();
                }
            } else if($val=='-')
            {
                //0 point
                //normalement on ne fait rien
                $a_score[$i] += 0;
                if($bonus>0)
                {
                    //après spare
                    $bonus--;
                }
            } else {
                //point
                $a_score[$i] += $val;
                if($bonus>0)
                {
                    //après spare
                    $bonus--;
                    $a_score[$i-1] += $val;
                }
                //on a eu un bonus de 2
                if($lastval0=='X' && $bonus>0){
                    $a_score[$i-2] += $val;
                    $a_score[$i-1] += $val;//rattrapage
                    $a_score[$i-2] += 10;
                    $a_score[$i-1] += 10;//rattrapage
                }
            }
            $lastval0 = $lastval;
            $lastval = $val;
        }//end for manche

        $a_score[$i] += $a_score[$i-1];
        $i++;//on passe au second jeu
    }//end for les 10 frames
    unset($a_score[0]);//on elimine l'initialisation
    return $a_score;
}

/*
A game of 10 pin bowling is played over the course of 10 frames.
At the beginning of each frame, 10 pins are arranged at the end of a bowling lane.
Each frame, The bowler receives 2 attempts to roll a bowling ball down the lane and knock over as many pins as possible.

Scoring works in the following way:

1. The bowler scores 1 point for each pin they knock down in a frame.

2. If all of the pins are knocked down on the second attempt, the bowler receives a Spare. This is worth 10 points plus 1 point for every pin knocked down by the bowler's next ball. For example:

* In the 1st frame, a bowler knocks down 8 pins with their first ball and the remaining 2 pins with their second ball and receives a Spare. In the second frame, the bowler knocks down 6 pins with their first ball and 3 pins with their second ball. The points earned in the first frame is 16 (10 + 6). 10 from the pins from the first frame and 6 from the first ball in the second frame.

3. If all of the pins are knocked down on the first attempt, the bowler receives a Strike. This is worth 10 points plus 1 point for every pin knocked down by the bowler's next two balls. For example:

* In the 1st frame, a bowler knocks down all 10 pins with their first ball and receives a Strike. In the second frame, they knock down 6 pins with their first ball and 3 pins with their second ball. The points earned from the first frame is 19 (10 + 6 + 3).

Another example:

* In the second frame, a bowler knocks down all 10 pins with their first ball and receives a Strike. In the third frame, they knock down all the pins with their first ball receiving a second Strike. In the fourth frame, they knock down 7 pins with their first ball and the remaining 3 pins with their second ball. The points earned from the second frame is 27 (10 + 10 + 7). The points earned from the third frame is 20 (10 + 7 + 3).

Final Frame:

In the 10th frame of a bowling game, there are 3 possible outcomes:

1. The bowler does not knock down all of the pins with their 2 attempts. At this point, they can earn no additional points.

2. The bowler scores a Spare with their second ball. This results in a new set of 10 pins being set and the bowler receives 1 bonus roll to add to their score.

3. The bowler scores a Strike with their first ball. This results in a new set of 10 pins being set and the bowler receives 2 bonus rolls to add to their score.

3a. If on the first bonus ball the bowler knocks down all of the pins, they receive 10 bonus points for the 10th frame. A new set of 10 pins is set and they are allowed to roll their last bonus ball to be added to their score. The pins knocked down from this last ball are only added as a bonus once to the Strike that was thrown with the first ball in the 10th frame.

Example:

In the 10th frame, a bowler scores a strike with their first ball, a strike with their first bonus ball, and 7 pins with their second bonus ball. The points earned from the 10th frame is 27 (10 + 10 + 7).

Task: Write a program that can calculate the cumulative points earned for each frame in a bowling game.

Score notation for each ball roll:

X => Strike
/ => Spare
- => Zero Points
K => An integer representing the number of pins knocked down

Example Input:

Each frame is separated by a space:

X X 9- 7/ -1 81 -- 9/ X X7-


Example Output:
29 48 57 67 68 77 77 97 124 141
*/
?>