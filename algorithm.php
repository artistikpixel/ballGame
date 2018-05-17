<?php


    // Acest algoritm sorteaza un numar de bile egal cu patratul numarului de culori introdus de la tastatura
    // Sortarea presupune ordonarea bilelor pe culori, in cutii
    // Cutiile au un numar fix, el fiind egal cu numarul de culori
    // Numarul de bile alocate in fiecare cutie este egal cu numarul de culori, implicit cu numarul de cutii

    // Tehnic, sortarea se face random
    // La inceput inputul cu bile este randomizat pentru a nu obtine de fiecare data aceeasi sortare
    // Mai apoi bilele sunt distribuite in cutii, cu ajutorul unui loop, dar conditionat de numarul maxim de bile ce trebuie sa intre in fiecare cutie.
    // Daca acesta este respectat, se returneaza cutia plina cu bile; fiind un loop, acesta se va executa pana cand se va consuma numarul total de bile, indiferent de culoare
    // Fiind asezate in cutii, trebuie respectata conditia ca in fiecare cutie sa exista un numar maxim de culori, in cazul nostru 2. Pentru asta, metoda colorsLimit numara daca si numai data
    // in fiecare cutie exista cel mult 2 culori, in caz contrar, scoate bilele din cutia respectiva (unset). Acest lucru se executa pana cand fiecare cutie respecta conditia
    // Avand in vedere acest algoritm, cu golirea cutiei de bile, in caz ca nu sunt maximum 2 culori, ne va returna, uneori un numar mai mic de cutii decat cel solicitat ($n), prin urmare
    // metoda limit din clasa LimitToNumber are rolul de a alege doar variantele in care cutiile sunt egale cu numarul de culori ($n)

    // Aplicatia se ruleaza la refresh, returnand de fiecare data un rezultat

    /*
     * var $n
     * @type int
     *
     * Number of colors for our balls
     */
    $n = 5;

    /*
     * array $input
     * @type array
     *
     * List of all balls distributed on colors
     */
    $input = array('rosu' => 1, 'verde' => 1, 'galben' => 1, 'roz' => 1, 'alb' => 21);

    /*
     * var $maxColor
     * @type int
     *
     * Maximum colors in each box
     */
    $maxColor = 2;

    /*
     * Class ShuffleBall
     */
    class ShuffleBall
    {
         /*
         * method shuffleBalls
         *
         * @param $input array
         * @return $balls type array
         *
         * Returns the array with balls distributed on colors
         */
        public function shuffleBalls($input)
        {
            foreach ($input as $myInput => $value) {

                for($i = 1; $i <= $value; $i++) {
                    $balls[] = $myInput;
                }

            }
            shuffle($balls);

            return $balls;
        }
    }

    /*
     * Class DistributeBalls
     */
    class DistributeBalls
    {
        /*
         * method distributeBalls
         *
         * @param $balls    type array  Array with balls shuffled
         * @param $n    type int        Number of colors
         * @return $box type array      Boxes filled
         *
         * Returns the boxes filled with balls
         */
        public function distribute($balls, $n)
        {
            $i = 0;
            foreach($balls as $k => $b) {

                if ($k % $n == 0) {
                    $i = 1;
                }

                if ($i <= $n) {
                    $box[$i][] = $b;
                    $i++;
                }
            }
            return $box;
        }

    }

    /*
     * Class SetMaxColorsOnBox
     */
    class SetMaxColorsOnBox
    {
        /*
         * method colorsLimit
         *
         * @param $n type int                   Number of colors
         * @param $box type array               Array with balls distributed in boxes
         * @return $maxColor type int           Maximum number of colors on each box
         *
         */
        public function colorsLimit($n, $box, $maxColor)
        {
            $ballsInBoxes = array();

            for($i = 1; $i < ($n+1); $i++){

                if(count(array_count_values($box[$i])) < ($maxColor + 1)) {
                    $ballsInBoxes[] = $box[$i];
                } else {
                    unset($ballsInBoxes);
                }
            }
            return $ballsInBoxes;
        }
    }

    /*
     * Class LimitToNumber
     */
    class LimitToNumber
    {
        /*
         * method limit
         * @param $ballsInBoxes type array      Array with final balls in boxes, already sorted on colors
         * @param $n type int                   Number of colors
         *
         * @return $ballsInBoxes type array     All boxes filled with balls, limited to $maxColor, but each try with $n boxes
         *
         */
        public function limit($ballsInBoxes, $n)
        {
            if(count($ballsInBoxes) % $n == 0 && isset($ballsInBoxes)){

                return $ballsInBoxes;

            } else {
                return false;
            }
        }
    }


    /*
     * Instantiate Class ShuffleBall
     * call method shuffleBalls
     */
    $ballGame = new ShuffleBall();
    $balls = $ballGame->shuffleBalls($input);

    /*
     * Instantiate Class DistributeBalls
     * call method distribute
     */
    $distributeBalls = new DistributeBalls();
    $box = $distributeBalls->distribute($balls, $n);

    /*
     * Instantiate Class SetMaxColorsOnBox
     * call method colorsLimit
     */
    $SetMaxColorsOnBox = new SetMaxColorsOnBox();
    $ballsInBoxes = $SetMaxColorsOnBox->colorsLimit($n, $box, $maxColor);

    /*
     * Instantiate Class LimitToNumber
     * call method limit
     */
    $LimitToNumber = new LimitToNumber();
    $result = $LimitToNumber->limit($ballsInBoxes, $n);


    var_dump($result);
?>
