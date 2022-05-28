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
                <img src="{{ asset('media/img/coconuts.png') }}">
            </div>
            <div class="user-title-leaderboard">
                <p>Name</p>
                <p>JSJKJAJKAS</p>
            </div>
        </div>

        <div class="world-rank-header">
            <p class="world-ranking-title">World Ranking</p>
            <span></span>
            <p>232</p>
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
                <th><p>ID</p></th>
                <th><p>Country</p></th>
              </tr>
              <tr>
                <td><p>1</p></td>
                <td><p>Smith</p></td>
                <td><p>50</p></td>
                <td><p>50</p></td>
                <td><p>50</p></td>
              </tr>

            </table>
          </div>

    </div>

</div>






@endsection
