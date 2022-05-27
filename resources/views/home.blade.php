@extends('layouts.app_black')

@section('content')
<section id="shop-section">
    <div id="card-home">
        <div id="card-content">
            <div class="responsive-options">
                <a class="leaderboard-box">
                    <img class="throphy-icon" title="https://www.flaticon.com/free-icons/prize Prize icons created by Freepik - Flaticon" src="{{ asset('media/img/icons/trofeo-rankings.png') }}" >
                </a>
                <span class="space-home"></span>
                <a class="leaderboard-box" href="{{ route("user.edit", Auth::user()->id) }}">
                    <img class="throphy-icon"  title="https://www.flaticon.com/free-icons/settings Settings icons created by Freepik - Flaticon" src="{{ asset('media/img/icons/settings-icon.png') }}" >
                </a>
            </div>
            <div id="user-info">
                <div class="name">
                        <p>{{ Auth::user()->username }}</p>
                </div>
                <div class="image-box">
                    <div>
                        <img src="{{ $items[0]->image }}">
                    </div>
                </div>
                <div class="rank-box">
                    <a class="rank">
                        <p></p>
                    </a>
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
                            <div id="user-data-main-header">
                                <a class="leaderboard-box">
                                    <img class="throphy-icon" title="https://www.flaticon.com/free-icons/prize Prize icons created by Freepik - Flaticon" src="{{ asset('media/img/icons/trofeo-rankings.png') }}" >
                                </a>
                                <span class="space-home"></span>
                                <a class="leaderboard-box" href="{{ route("user.edit", Auth::user()->id) }}">
                                    <img class="throphy-icon" title="https://www.flaticon.com/free-icons/settings Settings icons created by Freepik - Flaticon" src="{{ asset('media/img/icons/settings-icon.png') }}" >
                                </a>
                            </div>
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
<script>
    let rankbox = document.querySelector(".rank");
    let rankp = document.querySelector(".rank p");
    //fetch para conseguir el rango
    fetch(window.location + "/rank")
        .then(response => response.text())
        .then(data =>rankp.textContent= data);
    //si le da click a el botón podrá ver sus puntos actuales
    rankbox.addEventListener("click", ()=>{
        fetch(window.location + "/score")
        .then(response => response.text())
        .then(data =>console.log(data));
    });
</script>
@endsection
