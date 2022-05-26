<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function getCurrentGame($id)
    {
        return DB::table('current_games')->orderBy('created_at', 'desc')->where(['user_id1', $id])->orWhere(['user_id2', $id])->take(1);
    }

    public function createBoard($size)
    {
        $board = [];

        for ($i = 0; $i < $size; $i++) {
            $board[$i] = [];
            for ($j = 0; $j < $size; $j++) {
                $board[$i][$j] = '0';
            }
        }
        return $board;
    }


    function createHeaders($size) {
        $result = '  ';
        for ($i = 0; $i < $size; $i++) {
            $result .= $i + '  ';
        }
        return $result;
    }
}
