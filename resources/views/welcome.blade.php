@section('head')
    @extends('layouts.app_white')
@endsection
@section('content')
<div class="main">
    <video id="background-video" autoplay loop muted>
        <source src="{{ asset('media/video/video_background_hero_section_caribbean_warfare_sea_with_bubbles.webm') }}">
    </video>
    <div id="main-content">
        <h1>CARIBBEAN WARFARE</h1>
        <p>
            Caribbean Warfare its a game inspired in classic
            Battleship.
        </p>
    </div>
    <div class="button-section">
        <a href="{{ route('login') }}">
            <button id="calltoaction">
                <p>GET STARTED</p>
            </button>
        </a>

    </div>

</div>
@endsection


