<?php

namespace App\Http\Controllers;
use App\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function fetchRank($id){
        $rank = Rank::all();
        return $rank;
    }
}
