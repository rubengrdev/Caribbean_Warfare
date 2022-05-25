<?php

namespace App\Http\Controllers;


use App\CurrentGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lobby;
use Illuminate\Support\Facades\Auth;


class LobbyController extends Controller
{
    public function findGame()
    {

        $lobbies = DB::table('lobbies')->orderBy('created_at', 'asc')->select('connections')->take(1)->get();


        if ($lobbies->count() < 1) {
            Lobby::create([
                'user_id1' => Auth::user()->id,
                'user_id2' => null,
                'connections' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return back();

        } else {

            DB::table('lobbies')->orderBy('created_at', 'asc')->take(1)->update(['user_id2' => Auth::user()->id, 'connections' => 2]);

            // DB::table('lobbies')->where('connections', 2)->orderBy('created_at', 'asc')->select('*')->take(1)->get();

            $lobby = Lobby::where('user_id2', Auth::user()->id)->get();

            CurrentGame::create([
                'user_id1' => $lobby[0]['user_id1'],
                'user_id2' => $lobby[0]['user_id2'],
                'user1_boats' => null,
                'user2_boats' => null,
                'user1_shots' => null,
                'user2_shots' => null,
                'status' => 'ongoing',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            Lobby::where('user_id2', Auth::user()->id)->delete();

            return view('home');
        }

    }
}
