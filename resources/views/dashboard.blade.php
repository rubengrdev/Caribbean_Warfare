@section('head')
    @extends('layouts.app_black')
@endsection
@section('content')
<div class="dashboard">
    <div id="userdata">

        <div id="username">USERNAME</div>
        <div id="avatar"><img src="" alt=""></div>
        <div id="usertitle">Usertitle</div>
        <div id="livesinfo">
            <div id="lives">5x <img src="public/media/img/coconuts.png" alt=""> remaining</div>
            <div id="livestext">Your coconuts refill every 24 hours</div>
        </div>
    </div>

    <div id="useractions">

        <div id="inventory">Inventory</div>
        <div id="leaderboard"><img src="public/media/img/award.png" alt=""> Leaderboard</div>
        <div id="gamestart"><div>START NEW GAME</div></div>

    </div>
</div>

@endsection


