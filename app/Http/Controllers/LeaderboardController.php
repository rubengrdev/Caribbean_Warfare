<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $userdata=DB::table('inventories')->join('products','inventories.product_id','=','products.id')->where('user_id',Auth::user()->id)->where('equipped',1)->select('products.*', 'inventories.*')->get();
        $userscore=Score::where('id_user',Auth::id())->select('scores.*')->get();
        $this->getTop();

        return view('leaderboard',compact('userdata', 'userscore'));
    }

    public function getTop()
    {
        return DB::table('users')->join('scores','scores.id_user','=','users.id')->join('products','users.avatar_id','=','products.id')->orderBy('score', 'desc')->select('users.username','users.id','users.region_id','users.avatar_id','scores.score','products.image')->take(10)->get();
        //return Score::orderBy('score', 'desc')->select('scores.*')->take(10)->get();
        // No se si puedo pillar 2 values (id y score)
    }

    public function getTopRegion()
    {
        return DB::table('users')->join('scores','scores.id_user','=','users.id')->where('region_id',Auth::user()->region_id)->orderBy('score', 'desc')->value('id_user','score')->take(10)->get();

    }

    public function getTopRegionUserChoice($regionId)
    {
        return DB::table('users')->join('scores','scores.id_user','=','users.id')->where('region_id',$regionId)->orderBy('score', 'desc')->value('id_user','score')->take(10)->get();

    }
}
