<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Score;

class LeaderboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('leaderboard');
    }

    public function getTop()
    {
        return $topUsers = Score::where()->orderBy('score', 'desc')->value('id_user','score')->take(10)->get();
        // No se si puedo pillar 2 values (id y score)
    }
}
