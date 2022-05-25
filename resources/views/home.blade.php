@extends('layouts.app_black')

@section('content')
<section id="shop-section">
    <div id="card-home">
        <div id="card-content">
            <div id="user-info">
                <div class="name">
                        <p>{{ Auth::user()->username }}</p>
                </div>
                <div class="image-box">
                    <div>
                        <img src="{{ asset('media/img/skins/blas-de-lezo/blas-de-lezo-template-image-small-caribbean-warfare-render-skin-buy.png') }}">
                    </div>
                </div>
                <div class="rank-box">
                    <div class="rank">
                        <p>Rank</p>
                    </div>
                </div>
                <div class="coconout-box">
                    <div class="coconout-info">
                        <img class="coconout-thumnail" src="{{ asset('media/img/coconuts.png') }}">
                        <p>x 5 remaining</p>
                    </div>
                </div>
            </div>



            <article id="home-section">
                <div class="home-main">
                    <div id="home-main-order">
                        <div id="user-data-main">
                            
                        </div>
                        <div class="leaderboard-box">
                            <img class="throphy-icon" title="https://www.flaticon.com/free-icons/prize Prize icons created by Freepik - Flaticon" src="{{ asset('media/img/icons/trofeo-rankings.png') }}" >
                        </div>
                    </div>
                </div>
                <div class="start-game-box">
                    <div class="button-start-game">
                        <p>START NEW GAME</p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection
