<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Game extends Model
{

    public function __construct()
    {
        //
    }


    public static function addUser($user, $balls)
    {
        $i=1;
        foreach ($user as $usr){
            DB::table('boxes')->insert(array('box_number' => $i, 'id_box' => $balls));
            $idInserted = DB::getPdo()->lastInsertId();
            DB::table('colors')->insert(array('id_parent' => $idInserted, 'id_box' => $balls, 'box_content' => $usr));
            $i++;
        }
    }
}
