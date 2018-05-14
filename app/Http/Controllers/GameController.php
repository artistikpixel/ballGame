<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{

    /*
    * method for getting the number of balls
    * return boolean (true / false)
    */
    public static function getNumberOfBalls($currentBox, $n = null)
    {

        $values = explode("#", $currentBox);



        $numberOfBalls = 0;

        foreach ($values as $val) {

            $numberArray = explode("-", $val);
            $numberOfBalls += $numberArray[1];

        }

        return $numberOfBalls;
    }

    /*
    * method for check if a box is full with $n balls
    * return boolean (true / false)
    */
    public static function checkIfBoxIsFull($currentBox, $n)
    {

        if (self::getNumberOfBalls($currentBox) == $n) {

            return true;

        } else {

            return false;

        }
    }




}
