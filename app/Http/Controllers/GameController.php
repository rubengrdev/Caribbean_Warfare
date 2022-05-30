<?php

namespace App\Http\Controllers;

use App\Matche;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function getCurrentGame($id)
    {
        return DB::table('current_games')->orderBy('created_at', 'desc')->where(['user_id1', $id])->orWhere(['user_id2', $id])->take(1)->get();
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

    function winGame()
    {
        $currentGame = DB::table('current_games')->orderBy('created_at', 'desc')->where('user_id1', Auth::user()->id)->orWhere('user_id2', Auth::user()->id)->take(1)->get();


        Matche::create(['user_id1'=>$currentGame[0]->user_id1,'user_id2'=>$currentGame[0]->user_id2,'winner'=>$currentGame[0]->user_id1,'points'=>100, 'date'=> now(), 'created_at'=>now(), 'updated_at'=>now()]);

        $score1 =  Score::where('id_user', $currentGame[0]->user_id1)->get();
        $score2 =  Score::where('id_user', $currentGame[0]->user_id2)->get();

        // dd($score[0]->score);

        Score::where('id_user', $currentGame[0]->user_id1)->update(['score'=>$score1[0]->score+100]);
        Score::where('id_user', $currentGame[0]->user_id2)->update(['score'=>$score2[0]->score-100]);

        return back();
    }
}
