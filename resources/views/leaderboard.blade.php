@extends('layouts.app_black')

@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-inventory">
            <div class="location">
                <p>Leaderboard</p>
            </div>
        </nav>
    </div>
</section>
<div class="align-leaderboard">
    <div id="rankingheader">
        <div class="user-info-header">
            <div class="image-leaderboard">
                <img alt="profile image" src="{{ $userdata[0]->image }}">
            </div>
            <div class="user-title-leaderboard">
                <p>{{ Auth::user()->username }}</p>
                <p>#{{ Auth::user()->id }}</p>
            </div>
        </div>

        <div class="world-rank-header">
            <p class="world-ranking-title">Score</p>
            <span></span>
            <p>{{ $userscore[0]->score }}</p>
        </div>
    </div>

</div>
<div class="align-leaderboard">
    <div id="ranking-scoreboard">
        <div id="score-board-table" style="overflow-x:auto;">
            <table>
              <tr class="title-table">
                <th><p>Rank</p></th>
                <th></th>
                <th><p>Username</p></th>
                <th><p>Score</p></th>
                <th><p>Country</p></th>
              </tr>
              @foreach($top as $key => $t)
              <tr>
                <td><p>{{ $key+1 }}</p></td>
                <td><img  class="img-scoreboard" alt="user ranking profile image" src="{{ $t->image }}"></td>
                <td><p>{{ $t->username }}</p></td>
                <td><p>{{ $t->score }}</p></td>
                <td><p>{{ $t->region }}</p></td>
              </tr>
              @endforeach
            </table>
          </div>

    </div>

</div>






@endsection
