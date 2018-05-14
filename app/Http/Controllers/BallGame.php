<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Controllers\GameController;
error_reporting(E_ERROR | E_PARSE);



class BallGame extends Controller
{

    public function __construct(Request $request)
    {
        //
    }


    public function index(Request $request)
    {
        return view('home');
    }



    public function GameSession($n, $myColors)
    {

        $boxesArray = array();
        $currentBox = 0;
        //$myColors = array('verde' => 3, 'roz' => 10, 'albastru' => 1, 'galben' => 2, 'rosu' => 9);
        uksort($myColors, function() { return rand() > rand(); });

        foreach ($myColors as $key => $value)
        {
            $nOfBalls = 0;
            while ($value > 0)
            {

                if(GameController::checkIfBoxIsFull($boxesArray[$currentBox], $n))
                {
                    $currentBox = $currentBox + 1;
                }

                $nOfBalls = GameController::getNumberOfBalls($boxesArray[$currentBox], $n);


                if($value > $n) {

                    if($nOfBalls == 0)
                    {
                        $boxesArray[$currentBox] .= $key.'-'.$n.'#';
                        $value = $value - $n;
                    }
                    else{
                        $boxesArray[$currentBox] .= $key.'-'.($n - $nOfBalls).'#';
                        $value = $value - ($n - $nOfBalls);
                    }
                } else {

                    if($nOfBalls == 0)
                    {
                        $boxesArray[$currentBox] .= $key.'-'.$value.'#';
                        $value = 0;

                    } else {
                        if($value < ($n - $nOfBalls))
                        {
                            $boxesArray[$currentBox] .= $key.'-'.$value.'#';
                            $value = 0;
                        } else {
                            $boxesArray[$currentBox] .= $key.'-'.($n - $nOfBalls).'#';
                            $value = $value - ($n - $nOfBalls);
                        }
                    }
                }
            }
        }

        return $boxesArray;

    }

    public function formSubmit(Request $request)
    {
        $numarBile = request()->input('numarBile');
        $user['numarBile'] = count(request('culoare'))/2;
        $ballsId = rand(1,9999);
        $bila = request()->input('culoare');

        for($i = 0; $i < count($bila); $i+=2) {
            $child1[] = $bila[$i];
            $child2[] = $bila[$i+1];
            // print both
        }

        if(count($child2) != $numarBile)
        {
            return back()->withErrors('first_err', 'Fail to create user!');
        }

        $myColors = array_combine($child1, $child2);


        if ( $request->has('submitForm') && (csrf_token() == $request->input('_token')) && session()->get('_token') )
        {
            $user = $this->GameSession($user['numarBile'], $myColors);

            //dd($user);

            if(!Game::addUser($user, $ballsId)) {

                return redirect()->back()->withErrors('Datele nu au putut fi salvate in baza de date! Te rugam sa incerci.');

            }

            else
            return redirect('/')->with('success', 'User created successfully.');
        }
    }
}