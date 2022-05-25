<?php

namespace App\Http\Controllers;
use App\Rank;
use App\Score;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function fetchRank(){
        $ranks = Rank::all();
        $user = User::where('id', Auth::user()->id)->get();
        $rankId =  $user->toArray()[0]['rank_id'];
        foreach($ranks as $rank){
            if($rank->id == $rankId){
                return $rank->name;
            }
        }
    }


    public function fetchScore(){

        $userid = Auth::user()->id;

        $score = Score::all();
        return $score;


    }
}
