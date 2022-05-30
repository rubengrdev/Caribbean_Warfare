@extends('layouts.app_black')

@section('content')
<div class="show-header">
    <div class="margin-header">
<nav class="nav-shop">
    <div class="location-show">
        <p>Lobby</p>
    </div>
    <span class="bigpan"></span>


</nav>
</div>
</div>
<section id="game-section">
    <div class="lobby-header">

    </div>
    <div class="lobby-menu">
        <a class="button-win-game" href="{{ route('winGame')}}">
            <div>
                    <p>WIN GAME</p>
            </div>
        </a>
    </div>
</section>

<div id="grid-shop">
    {{-- {{dd($products)}} --}}

</div>






<!--
<script>
    let boardSize = 10;
    let myBoard = createBoard(boardSize);
    let enemyBoard = createBoard(boardSize);
    let gameDiv = document.getElementById('gameDiv');

    // printBoard(enemyBoard, true);
    // printBoard(myBoard);

    function createBoard(size)
    {
        board = [];

        for (let i = 0; i < size; i++) {
            board[i] = [];
            for (let j = 0; j < size; j++) {
                board[i][j] = '0';
            }
        }
        return board;
    }

    function printBoard (board, enemy = false) {
        const headers = createHeaders(board.length);
        gameDiv.innerHTML += headers + '<br>';
        console.log(headers);
        for (let i= 0; i < board.length; i++) {
            let rowStr = i + ' ';
            for (let cell of board[i]) {
                if (enemy && cell == '0'){
                    rowStr += '-  ';
                } else {
                    rowStr +=  '-  ';
                }
            }
            gameDiv.innerHTML += rowStr + '<br>';
            console.log(rowStr);
        }
    }

    function createHeaders(size) {
        result = '  ';
        for (let i = 0; i < size; i++) {
            result += i + '  ';
        }
        return result;
    }
</script>
-->
@endsection
