<?php

$n = 5; // numarul de culori
$nrBile = $n * $n; // numarul total de bile
$input = array('albastru' => 1, 'verde' => 1, 'galben' => 1, 'roz' => 1,    'alb' => 21); // distributia bilelor pe culori


$bile = array();
$count = array();



foreach ($input as $myInput => $value){
    for($i = 1; $i <= $value; $i++){
        $bile[] = $myInput;
    }
}

shuffle($bile);
$iteratie = 0;

function aranjeazaBile($bile){

    $i=0;
    $d=0;
    global $iteratie, $box;
    $iteratie++;

    $totalBile = count($bile);
    $iteration = 0;
    $i=0;
    $box = [];
    $currPositon = 0;

    while(count($bile) && $iteration < 100){

        $bilaCurrenta = (isset($bile[$currPositon]))?$bile[$currPositon]:false;


        if ($i == 5) {
            $i = 0;
        }

        if(!isset($box[$i])){
            $box[$i] = [];
            $tmpBox[$i] = [];
        }

        $tmpBox[$i][] = $bilaCurrenta;


        if (count(array_unique($tmpBox[$i])) < 3  && count($box[$i]) < 5) {

            $box[$i][] = $bilaCurrenta;
            unset($bile[$currPositon]);

        }


        $iteration++;
        $i++;
        $currPositon++;

        if($currPositon >= $totalBile){
            $currPositon=0;
        }
        
    }

    return $box;


}

echo '<pre>';
$bileA = aranjeazaBile($bile, []);
var_dump($bileA);
echo '</pre>';
?>
