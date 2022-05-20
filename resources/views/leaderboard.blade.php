@section('head')
    @extends('layouts.app_leaderboard')
@endsection

@section('content')
<div class="container">
    <h1>Leaderboard</h1>
    <div class="row justify-content-center">
        <form action="{{ route('leaderboard.getTop') }}">
            @csrf @method('GET')
            <input type="submit" value="Get Top">
        </form>
    </div>
</div>
@endsection
